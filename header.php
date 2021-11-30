<?php
    require_once __DIR__ ."/pre.php";
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>FF</title>
        <link rel="stylesheet" href="<?= $shop_css ?>">
    </head>
<body>
    <div class="main">
        <h2><a href="<? $index_php ?>">ようこそ！Family Foodsへ</a></h2>
<?php
    if($userName === "ゲスト"){
        echo '<li><a href="' . $login_php . '">ログイン</a></li>';
    } else{
        echo '<li><a href="' . $signup_php . '">ユーザー情報</a></li>';
        echo '<li>|</li><li><a href="' . $logout_php . '">ログアウト</a></li>';
    }
?>
    </ul>
    <hr>