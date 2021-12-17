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
    require_once __DIR__ . '/../header.php';
?>
<!-- <h2>レシピ詳細</h2><br> -->
<table class="recipe">
    <tr>
        <th colspan="2" class="recipetitle"><?= $recipe['title'] ?></th>
    </tr>
    <tr>
        <td colspan="2"><?= $recipe['comment'] ?></td>
    </tr>
    <tr>
        <th>投稿者: <?= $recipe['poster'] ?></th>
        <td><?= $recipe['servings'] ?>人分<td>
    <tr>
</table>

<div class="wrap">
    <section class="r_left">
        <img src="../images/<?= $recipe['imageName'] ?>">
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
                    <td class="td_material"><?= $material['material'] ?></td>
                    <td class="td_material"><?= $material['quantity'] ?></td> 
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
            <td><?= $instruction['instructionNumber'] ?>.</td>
            <td class="td_left"><?= $instruction['instruction'] ?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>
<div class="wrap2">
    <a href="./recipe_edit.php?recipeId=<?= $recipeId ?>">
        <input type="button" value="編集" class="button_edit"></a>
    <a href="./recipe_delete.php?recipeId=<?= $recipeId ?>">
        <input type="button" value="削除" class="button_delete"></a>
    <br><br>
    <a href="../family_foods/recipe_list.php"><input type="button" value="戻る" style="width:180px;height:30px"></a>
</div>
</form>
<?php
    require_once __DIR__ ."/../footer.php";
?>