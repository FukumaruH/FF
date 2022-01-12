<?php

    // 送られてきたレシピ内容を受け取る
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $poster = $_POST['poster'];
    $servings = $_POST['servings'];
    $materials = $_POST['material'];
    $quantities = $_POST['quantity'];
    $instructions = $_POST['instruction'];

    $posttime = new DateTime('now');

    session_start();

    // 画像が選択されているか
    if(empty($_FILES['image']['tmp_name'])) {
        $_SESSION['recipe_error'] = '画像が選択されていません。';
        header('Location: recipe_post.php');
        exit();
    }
    // ファイル拡張子の確認
    $imageType = exif_imagetype($_FILES['image']['tmp_name']);
    switch($imageType) {
        case IMAGETYPE_GIF:
            break;
        case IMAGETYPE_JPEG:
            break;
        case IMAGETYPE_PNG:
            break;
        default:
            $_SESSION['recipe_error'] = '画像は png/jpeg/gif のみ使用できます。';
            header('Location: recipe_post.php');
            exit();
    }

    // 画像のチェック
    if($_FILES['image']['error'] === 2) {
        $_SESSION['recipe_error'] = 'ファイルサイズが大きすぎます。';
        header('Location: recipe_post.php');
        exit();
    }
    if($_FILES['image']['error'] != UPLOAD_ERR_OK) {
        $_SESSION['recipe_error'] = '画像に関するエラーが発生しました。';
        header('Location: recipe_post.php');
        exit();
    }

    // Orderオブジェクトを生成する
    require_once __DIR__ . '/../classes/order.php';
    $order = new Order();

    $recipeId = $order->addrecipe($_SESSION['userId'], $title, $poster, $comment, $servings, $posttime);
    foreach($materials as $index => $material) {
        if(!empty($material) && !empty($quantities[$index])) {
            $order->addmaterial($material, $quantities[$index], $recipeId);
        }
    }
    foreach($instructions as $index => $value) {
        if(!empty($value)) {
            $order->addinstruction($value, $index + 1, $recipeId);
        }
    }

    //ファイル名を取得、重複しないよう変更
    $imageName = $recipeId . $_FILES['image']['name'];
    $dir = '../images/';
    try{
        if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])){
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $imageName);
        }
    }catch(Exception $e) {
        $_SESSION['recipe_error'] = '画像保存中にエラーが発生しました。';
		header('Location: recipe_post.php');
		exit();
    }   
    $order->addimage($imageName, $recipeId);

    $order->createview();
    header('Location: ../kanryou/toukoukanryou.php');
