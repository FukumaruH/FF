<?php
    require_once __DIR__ . '/../header.php';
?>
<script type="text/javascript">
$(function() {
  
    $('button#add1').click(function(){

        var objTable1  = document.getElementById('tableMaterial');
        var tr_form = '' +
        '<tr>' +
            '<td><input type="text" name="material[]" class="td_material"></td>' +
            '<td><input type="text" name="quantity[]" class="td_material"></td>' +
        '</tr>';
  
        $(tr_form).appendTo(objTable1.tBodies);
  
    });

    $('button#add2').click(function(){

        var objTable2  = document.getElementById('tableInstruction');
        var tr_form = '' +
        '<tr>' +
            '<td><input type="text" name="instruction[]" class="td_instruction"></td>' +
        '</tr>';

        $(tr_form).appendTo(objTable2.tBodies);

    });

});

</script>

<h2>レシピ投稿</h2><br>
<form method="POST" action="./recipe_db.php" enctype="multipart/form-data"> <!-- ファイル名書き換える -->
    <table class="recipe">
        <tr>
        <th>タイトル</th><td colspan="3"><input type="text" name="title" class="td_title"></td>
        </tr>
        <tr>
        <th>ひとこと</th><td colspan="3"><textarea name="comment" cols="60" rows="2"></textarea></td>
        </tr>
        <tr>
        <th>投稿者</th><td><input type="text" name="poster"></td><th>何人分</th><td><input type="text" name="servings"></td>
        </tr>
    </table>

<div class="wrap">
    <section class="r_left">
        <img class="detail_img" src="../images/sample1.jpg">
    </section>
    <section class="r_right">
        <table class="recipe recipe_material" id="tableMaterial">
            <thead>
                <tr><th>材料</th><th>分量</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="material" class="td_material"></td>
                    <td><input type="text" name="quantity" class="td_material"></td>
                </tr>
            </tbody>
            <tfoot>
                <td><button id="add1" type="button">追加</button></td>
            </tfoot>
        </table>
    </section>
</div>
<table class="recipe" id="tableInstruction">
    <thead>
        <tr><th class="td_left">手順</th></tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="instruction" class="td_instruction"></td>
        </tr>
    </tbody>
    <tfoot>
        <td><button id="add2" type="button">追加</button></td>
    </tfoot>
</table>
<div class="wrap2">
    <input type="submit" value="投稿" class="button_post">
    <br><br>
</div>
</form>
<?php
    require_once __DIR__ ."/../footer.php";
?>