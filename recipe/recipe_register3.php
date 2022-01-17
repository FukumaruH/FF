<?php

    // 送られてきたコメント内容を受け取る
    $comment = $_POST['comment'];
    $poster = $_POST['poster'];
    $recipeId = $_POST['recipeId'];

    session_start();

    // Orderオブジェクトを生成する
    require_once __DIR__ . '/../classes/order.php';
    $order = new Order();

    $order->addcomment($comment, $poster, $recipeId);

    header('Location: recipe_detail.php?recipeId=' . $recipeId);
    exit();