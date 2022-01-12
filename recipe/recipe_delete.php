<?php

    //recipeIdを受け取る
    $recipeId = $_GET['recipeId'];

    //オブジェクトを生成し、削除する
    require_once __DIR__ . "/../classes/cart.php";
    $delete = new Cart();
    $result = $delete->deleterecipe($recipeId);

    //ビューを作成する
    require_once __DIR__ . "/../classes/order.php";
    $view = new Order();
    $result = $view->createview();

    //完了画面へ遷移
    header('Location: ../kanryou/sakujokanryou.php');