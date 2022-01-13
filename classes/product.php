<?php
    // スーパークラスであるDbDataを利用するため
    require_once __DIR__ . '/dbdata.php';

    // Productクラスの宣言
    class  Product  extends  DbData {
        // 選択されたジャンルの商品を取り出す
        public  function  getItems ( $genre ) {
            $sql  =  "select  *  from  items  where  genre  =  ?";
            $stmt = $this->query( $sql,  [$genre] );
            $items = $stmt->fetchAll( );
            return  $items;
        }

        // 選択された商品を取り出す
        public function getItem($ident){
            $sql = "select * from items where ident = ?";
            $stmt = $this->query($sql, [$ident]);
            $item = $stmt->fetch();
            return $item;
        }

        //ログインしたuserIdのレシピ一覧を取り出す
       public function getrecipelist($userId){
           $sql = "select recipeId, title, comment, posttime, imageName from recipeslist where userId = ?";
           $stmt = $this->query($sql, [$userId]);
           $items = $stmt->fetchAll();
           return $items;
       }

       // 選択されたレシピを取り出す
       public function getRecipe($recipeId){
            $sql = "select * from recipeslist where recipeId = ?";
            $stmt = $this->query($sql, [$recipeId]);
            $recipe = $stmt->fetch();
            return $recipe;
        }

       // 選択されたレシピの材料を取り出す
        public function getMaterials($recipeId){
            $sql = "select * from materials where recipeId = ? order by materialId";
            $stmt = $this->query($sql, [$recipeId]);
            $materials = $stmt->fetchAll();
            return $materials;
        }

        // 選択されたレシピの手順を取り出す
        public function getInstructions($recipeId){
            $sql = "select * from instructions where recipeId = ? order by instructionNumber";
            $stmt = $this->query($sql, [$recipeId]);
            $instructions = $stmt->fetchAll();
            return $instructions;
        }

        //選択されたレシピのコメントを取り出す
        public function getComments($recipeId){
            $sql = "select * from comments where recipeId = ? order by commentId";
            $stmt = $this->query($sql, [$recipeId]);
            $comments = $stmt->fetchAll();
            return $comments;
        }

    }
