<?php
//現在アクセスしているユーザーのユーザーID($userId)とユーザー名($userName)を特定する
//セッションからもクッキーからも取得できなかった場合は、仮のユーザーIDを発行する
//この場合、ユーザーIDは｢8桁の乱数｣、ユーザー名は｢ゲスト｣とする

//セッションが開始されていなければ、開始する
if(!isset($_SESSION)){
    session_start();
}

//セッション情報としてユーザーID、名前が保持されているなら、それを取得する(三項演算子を使用している)
$userId = isset($_SESSION['userId']) ? $_SESSION['userId']:'';
$userName = isset($_SESSION['userName']) ? $_SESSION['userName']:'';

//セッション情報にユーザーID、名前が保持されていない場合で
if(empty($userId) || empty($userName)){
    //クッキーにユーザーID、名前が保持されているなら、それを取得する
    if(isset($_COOKIE['userId']) && isset($_COOKIE['userName'])){
        $userId = $_COOKIE['userId'];
        $userName = $_COOKIE['userName'];
    //クッキーにもユーザーID、名前が保持されていないなら、8桁の乱数を発生させて仮のIDとしユーザー名はゲストとする
    //クッキーの有効期限は2週間とする
    } else{
        $userId = (string)mt_rand(10000000, 99999999);
        $userName = 'ゲスト';
        setcookie("userId", $userId, time() + 60*60*24*14, '/');
        setcookie("userName", $userName, time() + 60*60*24*14, '/');
    }

    //以上で決定したユーザーID、名前をセッション情報として保持する
    $_SESSION['userId'] = $userId;
    $_SESSION['userName'] = $userName;
}

//ヘッダー・フッターで使用するリンクのFQDN(Fully Qualified Domain Name)作成の準備
$http_host = '//' .$_SERVER['SERVER_NAME'];
$shopid = mb_substr($_SERVER['REQUEST_URI'], 1, 9);

//ヘッダー・フッターで使用するリンクのURLを用意する
$index_php = $http_host .'/'.$shopid.'/index.php';
$cart_list_php = $http_host .'/'.$shopid.'/cart/cart_list.php';
$order_history_php = $http_host .'/'.$shopid.'/order/order_history.php';
$login_php = $http_host .'/'.$shopid.'/user/login.php';
$logout_php = $http_host .'/'.$shopid.'/user/logout.php';
$signup_php = $http_host .'/'.$shopid.'/user/signup.php';

//CSSファイルのURLを用意する
$shop_css = $http_host .'/'.$shopid.'/css/shop.css';