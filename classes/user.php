<?php
    //スーパークラスであるDbDataを利用するため
    require_once __DIR__ ."/dbdata.php";

    class User extends DbData{
        //ログイン認証処理
        public function authUser($userId, $password){
            $sql = "select * from users where userId = ? and password = ?";
            $stmt = $this->query($sql, [$userId, $password]);
            return $stmt->fetch();
        }

        //ゲストからログインした場合、カート内の商品が入っていれば、ログイン後のユーザーID(メールアドレス)に変更する
        public function changeCartUserId($tempId, $userId){
            //Cartオブジェクトを生成し、カート内の商品のユーザーIDに変更する
            require_once __DIR__ ."/../classes/cart.php";
            $cart = new Cart();
            $cart->changeUserId($tempId, $userId);
        }
    
        //ユーザー登録処理
        public function signUp($userId, $password){
            $sql = "select * from users where userId = ?";
            $stmt = $this->query($sql, [$userId]);
            $result = $stmt->fetchAll();
            //登録しようとしているユーザーID(Eメール)が既に登録されている場合
            if($result){
                return 'この' . $userId . 'は既に登録されています。';
            }
            $sql = "insert into users(userId, password) values(?, ?)";
            $result = $this->exec($sql, [$userId, $password]);

            if($result){
                //登録に成功した場合
                
                return '';
            } else{
                //何らかの原因で失敗した場合
                return '新規登録できませんでした。管理者にお問い合わせください。';
            }
        }

        //ユーザー情報更新処理
    public function updateUser($userId, $userName, $kana, $zip, $address, $tel, $password, $tempId){
        $sql = "update users set userId = ?, userName = ?, kana = ?, zip = ?, address = ?, tel = ?, password = ? where userId = ?";
        $result = $this->exec($sql, [$userId, $userName, $kana, $zip, $address, $tel, $password, $tempId]);

        if($result){
            //更新に成功したが、Cart内に仮のユーザーIDの商品が入っていた場合、新しんユーザーIDに置き換える
            //また、過去の注文履歴のユーザーIDもあたしいユーザーIDに置き換える
            if($userId !== $tempId){
                $this->changeCartUserId($tempId, $userId);
                $this->changeOrderHistoryUserId($tempId, $userId);
            }
            return '';
        } else{
            return 'ユーザー情報の更新ができませんでした。管理者にお問い合わせください。';
        }
    }

    //ユーザーID(Eメール)を変更した場合、過去の注文履歴のユーザーID(Eメール)を新しいユーザーIDに変更する
    public function changeOrderHistoryUserId($tempId, $userId){
        //Orderオブジェクトを生成し、注文履歴のユーザーID(Eメール)を変更する
        require_once __DIR__ . "/../classes/order.php";
        $order = new Order();
        $order->changeUserId($tempId, $userId);
    }
    }