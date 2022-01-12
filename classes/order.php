<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Order extends DbData {
    //投稿されたレシピの内容をrecipesテーブルに登録する
    public function addrecipe($userId, $title, $poster, $comment, $servings, $posttime){
      $sql = "insert into recipes (userId, title, poster, comment, servings, posttime) values (?, ?, ?, ?, ?, ?)";
      $result = $this->exec($sql, [$userId, $title, $poster, $comment, $servings, date("Y-m-d H:i:s")]);
      $sql = "select max(recipeId) from recipes WHERE userId = ?";
      $stmt = $this->query( $sql,  [$userId]);
      $result = $stmt->fetch();
      $recipeId = $result[ 0 ];
      return $recipeId;
    }
    //投稿されたレシピの内容をmaterialsテーブルに登録する
    public function addmaterial($material, $quantity, $recipeId){
      $sql = "insert into materials (material, quantity, recipeId) values (?, ?, ?)";
      $result = $this->exec($sql, [$material, $quantity, $recipeId]);
    }
    //投稿されたレシピの内容をinstructionsテーブルに登録する
    public function addinstruction($instruction, $instructionNumber, $recipeId){
      $sql = "insert into instructions (instruction, instructionNumber, recipeId) values (?, ?, ?)";
      $result = $this->exec($sql, [$instruction, $instructionNumber, $recipeId]);
    }
    //投稿されたレシピの内容をimagesテーブルに登録する
    public function addimage($imageName, $recipeId){
      $sql = "insert into images (imageName, recipeId) values (?, ?)";
      $result = $this->exec($sql, [$imageName, $recipeId]);
    }
    //ビューrecipelistを再度作成する
    public function createview(){
      $sql = "CREATE OR REPLACE VIEW recipeslist AS SELECT recipes.userId, recipes.recipeId, recipes.title, 
      recipes.poster, recipes.comment, recipes.servings, recipes.posttime, images.imageName 
      FROM recipes, images WHERE recipes.recipeId = images.recipeId";
      $result = $this->exec($sql, [ ]);
    }
  }
