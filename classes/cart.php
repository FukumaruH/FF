<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Cart extends DbData{

    //各テーブルの指定されたrecipeIdを持つ情報を削除する
    public function deleterecipe($recipeId){
      $sql = "delete from images where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from instructions where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from materials where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from comments where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
      $sql = "delete from recipes where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
    }

    //イメージテーブルの指定されたrecipeIdを持つ情報を削除する
    public function deleteimage($recipeId){
      $sql = "delete from images where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
    }

    //手順テーブルの指定されたrecipeIdを持つ情報を削除する
    public function deleteinstruction($recipeId){
      $sql = "delete from instructions where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
    }

    //材料テーブルの指定されたrecipeIdを持つ情報を削除する
    public function deletematerial($recipeId){
      $sql = "delete from materials where recipeId = ?";
      $result = $this->exec($sql, [$recipeId]);
    }

    //レシピテーブルを更新する
    public function updaterecipe($title, $poster, $comment, $servings, $posttime, $recipeId){
      $sql = "update recipes set title = ?, poster = ?, comment = ?, servings = ?, posttime = ? where recipeId = ?";
      $result = $this->exec($sql, [$title, $poster, $comment, $servings, date("Y-m-d H:i:s"), $recipeId]);
    }

  }