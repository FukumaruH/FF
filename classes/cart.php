<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Cart extends DbData{
    // 商品をカートに入れる ・・ テーブルcartに登録する
    public function addItem($userId, $ident, $quantity){
      // すでにカート内にその商品がはいっているかどうかをチェックする
      $sql = "select * from cart where userId = ? and ident = ?";
      $stmt = $this->query($sql, [$userId, $ident]);
      $cart_item = $stmt->fetch();
      if($cart_item){
        // カート内にすでに入っているので、今回の注文数を追加する
        $new_quantity = $quantity + $cart_item['quantity'];
        if($new_quantity > 10 ) $new_quantity = 10;
        $sql = "update cart set quantity = ? where userId = ? and ident = ?";
        $result = $this->exec($sql, [$new_quantity, $userId, $ident]);
      } else {
        // カート内にはまだ入っていないので登録する
        $sql = "insert into cart values(?, ?, ?)";
        $result = $this->exec($sql, [$userId, $ident, $quantity]);
      }
    }

    //各テーブルの指定されたrecipeIdを持つ情報を削除する
    public function deleterecipe($recipeId){
      $sql = "delete from images where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from instructions where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from materials where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from recipes where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
    }

    // カート内の商品を削除する
    public function deleteItem($userId, $ident){
      $sql = "delete from cart where userId = ? and ident = ?";
      $result = $this->exec($sql, [$userId, $ident]);
    }

    //ゲストからログインした場合、カート内の仮のユーザーIDをログイン後の正式なユーザーIDの値に変更する
    public function changeUserId($tempId, $userId){
      $sql = "select * from cart where userId = ?";
      $stmt = $this->query($sql, [$tempId]);
      $cart_items = $stmt->fetchAll();
      foreach($cart_items as $item){
        $this->addItem($userId, $item['ident'], $item['quantity']);
        $this->deleteItem($tempId, $item['ident']);
      }
    }
  }