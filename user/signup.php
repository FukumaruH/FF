<?php
    require_once __DIR__ . "/../header.php";
    require_once __DIR__ . "/../util.php";
    if(isset($_SESSION['signup_error'])){
        echo '<p class="error_class">' . $_SESSION['signup_error']. '</p>';
        unset($_SESSION['signup_error']);
    }




    $title = "ユーザー情報を登録してください。";
?>
<p><?= $title ?></p>
<form method="POST" action="./signup_db.php">
<table>
    <tr><td>家族ID</td><td><input type="text" name="userId"  required></td></tr>
    <tr><td>パスワード</td><td><input type="password" name="password" required></td></tr>
    <tr><td>確認用パスワード</td><td><input type="password" name="password1" required></td></tr>

    <tr><td colspan="2"><input type="submit" value="送信"></td></tr>
</table>
</form>
<?php
    require_once __DIR__ . "/../footer.php";
?>