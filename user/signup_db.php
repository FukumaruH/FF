<?php
//送られてきたデータを受け取
$userId = $_POST['userId'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

session_start();

//ユーザーIDの長さを取得し12より小さければエラーとする
if(strlen($userId)<12){
    $_SESSION['signup_error'] = '12文字以上にしてください。';
    header('Location: signup.php');
    exit();
}

//ユーザーIDを半角英数字かチェック
if(preg_match('/[^A-Za-z0-9]/', $userId)){
    $_SESSION['signup_error'] = '半角英数字で入力してください。';
    header('Location: signup.php');
    exit();
}

//ユーザーパスワードのチェック
if($password !== $password1){
    $_SESSION['signup_error'] = '入力されたパスワードと確認用パスワードが違います。';
    header('Location: signup.php');
    exit();
}

//Userオブジェクトを生成し、ユーザー登録・更新処理を行う
require_once __DIR__ . "/../classes/user.php";
$user = new User();

$result = $user->signUp($userId, $password);

//登録に失敗した場合、エラーメッセージをセッションに保存し、ユーザー登録画面(signup.php)に遷移する
if($result !== ''){
    $_SESSION['signup_error'] = $result;
    header('Location: signup.php');
    exit();
}

//ユーザー情報をセッションに保持する
$_SESSION['userId'] = $userId;

//ユーザーIDと名前をクッキーに保持する
setcookie("userId", $userId, time() + 60*60*24*14, '/');

require_once __DIR__ ."/../header.php";
require_once __DIR__ ."/../util.php";
?>
登録が完了しました<br>
このページをプリントアウトするか<br>
もしくは紙にメモをして頂き、忘れないように注意してください<br>
<table>
<tr><td>家族ID</td><td><?= h($userId) ?></td></tr>
<tr><td>パスワード</td><td><?= h($password) ?></td></tr>
</table>

<a href="./login.php"><span class="button_image">ログイン画面へ</span></a>
<?php
    require_once __DIR__ . "/../footer.php";
?>