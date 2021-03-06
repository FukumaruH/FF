<?php
require_once __DIR__ . "/../header_login.php";
require_once __DIR__ . "/../util.php";

//オブジェクトを生成する
require_once __DIR__ . "/../classes/product.php";
$recipelist = new Product();

//ビューrecipelistからログインしたユーザーの投稿レシピ一覧情報を取得
$recipes = $recipelist->getrecipelist($_SESSION['userId']);

echo '<p>こんにちは、'.$_SESSION['userId'].'様。</p>';
if(empty($recipes)){
    //投稿レシピの情報がない場合
    echo '<p>' . $_SESSION['userId'] . '様の投稿レシピ一覧はございません。</p>';
  } else{
    //投稿レシピの情報がある場合
    echo '<p>投稿レシピ一覧は次の通りです。</p>';
    echo '<p>ご家庭の味をお楽しみください。</p>';
  }
?>

<!--<p style="text-align: right;margin-right:30px";><a href="//localhost/FF/user/logout.php">
    <input type="button" value="ログアウト" style="width:100px;height:30px"></a></p> -->
<!-- <p style="text-align: right;margin-right:30px";><a href="//localhost/FF/recipe/recipe_post.php">
    <input type="button" 
    img src="/FF/images/test0.png" width="50px" height="50px" 
                onmouseover="this.src='/FF/images/test.png'"
                onmouseout="this.src='/FF/images/test0.png'" 
    value="レシピを投稿する" style="width:150px;height:50px;
    background-color:#b2ffd8;border-radius:5px;border:2px solid #8ae6b8;"></a><p> -->


<p style="text-align: right;margin-right:30px";>
<a href="//localhost/FF/recipe/recipe_post.php">
<img src="/FF/images/button-images/button0.png" width="170px" height="60px" 
                onmouseover="this.src='/FF/images/button-images/button1.png'"
                onmouseout="this.src='/FF/images/button-images/button0.png'"></a></p>


<h1>投稿レシピ一覧</h1><hr><br>

<?php
    //ログインしたユーザーの投稿レシピ一覧を表示する
    $recipeId = 0;
    foreach($recipes as $recipe){
        if($recipe['recipeId'] != $recipeId){
            if($recipeId != 0){
                //recipeIdが変わったら仕切りする
                echo '<hr width="500"><hr width="500">';
            }
            $recipeId = $recipe['recipeId'];
        }
?>
<!-- データベースから取得したデータを画面に表示する -->
<body>
<div class="wrap">
    <section class="sachi_left">
        <div class="sachi_text">
            <a href="//localhost/FF/recipe/recipe_detail.php?recipeId=<?= $recipeId ?>"><h3><?= h($recipe['title']) ?></h3></a>
            <?= $recipe['comment'] ?><br><br>
            <font color="gray"><?= h($recipe['posttime']) ?></font><br>
        </div>
    </section>
    <section class="sachi_right">
        <div class="sachi_img">
            <a href="//localhost/FF/recipe/recipe_detail.php?recipeId=<?= $recipeId ?>">
            <img src="../images/<?= h($recipe['imageName']) ?>"
            ></a>
        </div>
    </section>
</div>
</body>
<?php
    }

    require_once __DIR__ . "/../footer.php";
?>