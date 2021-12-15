<?php
    /*
    // Productオブジェクトを生成する
    require_once __DIR__ . '/../classes/product.php';
    $product = new Product();
    // 選択された商品を取り出す
    $item = $product->getItem($ident);
    */
    require_once __DIR__ . '/../header.php';
?>
<!-- <h2>レシピ詳細</h2><br> -->
<table class="recipe">
    <tr>
    <!-- <th><?= $item['title'] ?></th> -->
    <th colspan="2" class="recipetitle">トマトサラダ</th>
    </tr>
    <tr>
    <!-- <td><?= $item['comment'] ?></td> -->
    <td colspan="2">トマトの彩り鮮やかなサラダです。</td>
    </tr>
    <tr>
    <th>投稿者: 母</th><td>2人分<td>
    <tr>
</table>

<div class="wrap">
    <section class="r_left">
        <img class="detail_img" src="https://1.bp.blogspot.com/-M28GZaegp38/X68afYkxWXI/AAAAAAABcQw/tSAxXfPaPp8GtBwzh9eieDieqWXxS47IgCNcBGAsYHQ/s757/food_thai_somtom_salad.png"
            >
    </section>
    <section class="r_right">
        <table class="recipe recipe_material" id="tableMaterial">
            <thead>
                <tr><th>材料</th><th>分量</th></tr>
            </thead>
            <tbody>
                <tr>
                    <!--
                    <td><?= $item['material'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    -->
                    <td class="td_material">トマト</td>
                    <td class="td_material">2個</td>
                </tr>
                <tr>
                    <td>レタス</td>
                    <td>3枚</td>
                </tr>
                <tr>
                    <td>きゅうり</td>
                    <td>1本</td>
                </tr>
                <tr>
                    <td>胡麻ドレッシング</td>
                    <td>適量</td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
<table class="recipe" id="tableInstruction">
    <thead>
        <tr><th class="td_left">手順</th></tr>
    </thead>
    <tbody>
        <tr>
            <!-- <td><?= $item['instruction'] ?></td> -->
            <td class="td_left">トマトはくし形切り、きゅうりは薄く斜めに切る。</td>
        </tr>
        <tr>
            <td class="td_left">レタスは手で口に入るくらいの大きさにちぎる。</td>
        </tr>
        <tr>
            <td class="td_left">器に盛って、満足するだけのドレッシングをかけて完成。</td>
        </tr>
    </tbody>
</table>
<div class="wrap2">
    <a href="./recipe_edit.php?recipeId=<?= $item['recipeId'] ?>">
        <input type="button" value="編集" class="button_edit"></a>
    <a href="./recipe_delete.php?recipeId=<?= $item['recipeId'] ?>">
        <input type="button" value="削除" class="button_delete"></a>
    <br><br>
    <a href="//localhost/FF/family_foods/recipe_list.php"><input type="button" value="戻る" style="width:180px;height:30px"></a>
</div>
</form>
<?php
    require_once __DIR__ ."/../footer.php";
?>