<?php
    require_once __DIR__ . '/../header_login.php';
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

    $('#upfile').change(function(e){
        //ファイルオブジェクトを取得する
        var file = e.target.files[0];
        var reader = new FileReader();
        
        //画像でない場合は処理終了
        if(file.type.indexOf("image") < 0){
            alert("画像ファイルを指定してください。");
            return false;
        }
 
        //アップロードした画像を設定する
        reader.onload = (function(file){
            return function(e){
                $("#thumbnail").attr("src", e.target.result);
                $("#thumbnail").attr("title", file.name);
            };
        })(file);
        reader.readAsDataURL(file);
 
    });

});

</script>

<h2>レシピ投稿</h2><br>
<?php
    if(isset($_SESSION['recipe_error'])){
        echo '<p class="error_class">' . $_SESSION['recipe_error']. '</p>';
        unset($_SESSION['recipe_error']);
    }
?>
<form method="POST" action="./recipe_register.php" enctype="multipart/form-data">
    <table class="recipe">
        <tr>
        <th>タイトル</th><td colspan="3"><input type="text" name="title" class="td_title" required></td>
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
        <input type="file" name="image" id="upfile" accept="image/*">
        <img id="thumbnail" src="">
    </section>
    <section class="r_right">
        <br>
        <table class="recipe recipe_material" id="tableMaterial">
            <thead>
                <tr><th>材料</th><th>分量</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="material[]" class="td_material" required></td>
                    <td><input type="text" name="quantity[]" class="td_material" required></td>
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
            <td><input type="text" name="instruction[]" class="td_instruction" required></td>
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