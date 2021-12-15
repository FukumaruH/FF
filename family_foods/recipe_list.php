<?php
require_once __DIR__ . "/../header.php";
?>
<p>こんにちは、<?= $_SESSION['userId'] ?>様。</p>
<p>ご家庭の味ををお楽しみください。</p>

<p style="text-align: right;margin-right:30px";><a href="//localhost/FF/user/logout.php">
    <input type="button" value="ログアウト" style="width:100px;height:30px"></a></p>
<p style="text-align: right;margin-right:30px";><a href="//localhost/FF/recipe/recipe_post.php">
    <input type="button" value="レシピを投稿する" style="width:150px;height:50px;"></a><p>

<h1>投稿レシピ一覧</h1><hr><br>

<body>
<div class="wrap">
    <section class="sachi_left">
        <div class="sachi_text">
            <a href="//localhost/FF/recipe/recipe_detail.php"><h3>トマトサラダ</h3></a>
            トマトの色どり鮮やかなサ....<br><br>
            <font color="gray">2021年 11月 29日 11:29</font><br>
        </div>
    </section>
    <section class="sachi_right">
        <div class="sachi_img">
            <a href="//localhost/FF/recipe/recipe_detail.php">
            <img src="https://1.bp.blogspot.com/-M28GZaegp38/X68afYkxWXI/AAAAAAABcQw/tSAxXfPaPp8GtBwzh9eieDieqWXxS47IgCNcBGAsYHQ/s757/food_thai_somtom_salad.png"
            ></a>
        </div>
    </section>
</div>
</body>

<hr width="500"><hr width="500">

<body>
<div class="wrap">
    <section class="sachi_left">
        <div class="sachi_text">
            <!--<a href="#">--><h3>角煮</h3></a>
            良く煮込まれた柔らかい角....<br><br>
            <font color="gray">2021年 11月 26日 20:40</font><br>
        </div>
    </section>
    <section class="sachi_right">
        <div class="sachi_img">
            <!--<a href="#">-->
            <img src="https://1.bp.blogspot.com/-m37XlCVf2QM/XzIec2XVlBI/AAAAAAABajM/97kToy2rmAs_JPxWaQaYCDA1AQkrxIBrgCNcBGAsYHQ/s400/food_rendang_rundan.png"
            ></a>
        </div>
    </section>
</div>
</body>


<!-- <body>
<a href="//localhost/FF/family_foods/recipe_sample/salada.php"><h3>トマトサラダ</h3></a>
トマトの色どり鮮やかなサ....<br><br>
<font color="gray">2021年 11月 29日 11:29</font><br>

<div class="example">
<a href="//localhost/FF/family_foods/recipe_sample/salada.php">
<p><img src="https://1.bp.blogspot.com/-M28GZaegp38/X68afYkxWXI/AAAAAAABcQw/tSAxXfPaPp8GtBwzh9eieDieqWXxS47IgCNcBGAsYHQ/s757/food_thai_somtom_salad.png"
alt="画像のサンプル" width="190" height="160"></p></a>
</div></body> -->

<?php 
    require_once __DIR__ . "/../footer.php";
?>