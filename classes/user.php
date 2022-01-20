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

    }