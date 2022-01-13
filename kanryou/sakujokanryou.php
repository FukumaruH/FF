<?php
    require_once __DIR__ . '/../header_login.php';
    $http_host = '//' .$_SERVER['SERVER_NAME'];
    $FFid = mb_substr($_SERVER['REQUEST_URI'], 1, 2);
    $shop_css = $http_host .'/'.$FFid.'/css/shop.css';
?>
<link rel="stylesheet" href="<?= $shop_css ?>">
  <body>
   <div class="main">
       <br>
    <h2>削除が完了しました</h2><br>
    <ul class="navi">
     <li><a href="../recipe/recipe_post.php">レシピを投稿する</a></li>
     <li>|</li>
     <li><a href="../family_foods/recipe_list.php">レシピ一覧に戻る</a></li>
     <li>|</li>
     <li><a href="../user/logout.php">ログアウト</a></li>
<?php
    require_once __DIR__ ."/../footer.php";
?>