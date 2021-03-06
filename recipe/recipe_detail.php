<?php
    // 送られてきたrecipeIdを受け取る
    $recipeId = $_GET['recipeId'];
    // Productオブジェクトを生成する
    require_once __DIR__ . '/../classes/product.php';
    $product = new Product();
    // 選択された商品を取り出す
    $recipe = $product->getRecipe($recipeId);
    $materials = $product->getMaterials($recipeId);
    $instructions = $product->getInstructions($recipeId);
    $comments = $product->getComments($recipeId);
    require_once __DIR__ . '/../header_login.php';
    require_once __DIR__ . '/../util.php'
?>
<!-- <h2>レシピ詳細</h2><br> -->
<table class="recipe">
    <tr>
        <th colspan="2" class="recipetitle"><?= h($recipe['title']) ?></th>
    </tr>
    <tr>
        <td colspan="2"><?= h($recipe['comment']) ?></td>
    </tr>
    <tr>
        <th>投稿者: <?= h($recipe['poster']) ?></th>
        <td><?= h($recipe['servings']) ?>人分<td>
    <tr>
</table>

<div class="wrap">
    <section class="r_left">
        <img src="../images/<?= h($recipe['imageName']) ?>">
    </section>
    <section class="r_right">
        <table class="recipe recipe_material" id="tableMaterial">
            <thead>
                <tr><th>材料</th><th>分量</th></tr>
            </thead>
            <tbody>
<?php
            foreach($materials as $material) {
?>
                <tr>
                    <td class="td_material"><?= h($material['material']) ?></td>
                    <td class="td_material"><?= h($material['quantity']) ?></td> 
                </tr> 
<?php
            }
?>        
            </tbody>
        </table>
    </section>
</div>
<table class="recipe" id="tableInstruction">
    <thead>
        <tr><th class="td_left">手順</th><th></th></tr>
    </thead>
    <tbody>
<?php
    foreach($instructions as $instruction) {
?>        
        <tr>
            <td><?= h($instruction['instructionNumber']) ?>.</td>
            <td class="td_left"><?= h($instruction['instruction']) ?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>
<!-- ポップアップで行う処理 -->
<script>
 
function confirm_delete() { // 削除ボタンをクリックした場合
    document.getElementById('popup').style.display = 'block';
    return false;
}
 
function okfunc() { // OKをクリックした場合
    window.location.href = 'http://localhost/FF/recipe/recipe_delete.php?recipeId=<?= $recipeId ?>';
}
 
function nofunc() { // キャンセルをクリックした場合
    document.getElementById('popup').style.display = 'none';
}
</script>
<div class="wrap2">
    <a href="./recipe_edit.php?recipeId=<?= $recipeId ?>">
        <img src="/FF/images/button-images/henshu0.png" width="90px" height="70px" 
                onmouseover="this.src='/FF/images/button-images/henshu1.png'"
                onmouseout="this.src='/FF/images/button-images/henshu0.png'">
        <!-- <input type="button" value="編集" class="button_edit"> --> </a>
        <!-- <input type="button" value="削除" class="button_delete" -->
        <img src="/FF/images/button-images/sakuzyo0.png" width="90px" height="70px" 
                onmouseover="this.src='/FF/images/button-images/sakuzyo1.png'"
                onmouseout="this.src='/FF/images/button-images/sakuzyo0.png'" onclick="return confirm_delete()"></a>
    <br><br>
    <br><br>
    <a href="../family_foods/recipe_list.php"><input type="button" value="戻る" style="width:180px;height:30px"></a>
</div>
</form>
<!-- ポップアップ -->
<div id="popup" style="width: 500px;font-size: 42px;background-color: #e0ffff;display: none;padding: 30px 20px;border: 2px solid #000;margin: auto;">
<th><?= h($recipe['title']) ?></th><br>
    本当に削除しますか？<br />
    <button id="ok" onclick="okfunc()">はい</button>
    <button id="no" onclick="nofunc()">いいえ</button>
</div>
<br><hr><br>

<table>
<?php
    foreach($comments as $comment) {
?>
    <tr>
        <th class="td_left">投稿者: <?= h($comment['poster']) ?></th>
        <td class="td_left"><?= h($comment['comment']) ?><td>
    <tr>
<?php
    }
?>
</table>
<br>
<form method="POST" action="./recipe_register3.php">
<table class="recipe">
    <tr>
        <th>投稿者</th><td><input type="text" name="poster" maxlength="20" class="td_title" required></td>
    </tr>
    <tr>
        <th>コメント</th><td><textarea name="comment" cols="60" rows="2" maxlength="255" required></textarea></td>
    </tr>
</table>
<input type="hidden" name="recipeId" value="<?= $recipeId ?>">
<input type="submit" value="コメントを送信">
</form>
<br>
<?php
    require_once __DIR__ ."/../footer.php";
?>