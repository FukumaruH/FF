<?php
    
    // 送られてきたレシピ内容を受け取る
    $recipeId = $_POST['recipeId'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $poster = $_POST['poster'];
    $servings = $_POST['servings'];
    $materials = $_POST['material'];
    $quantities = $_POST['quantity'];
    $instructions = $_POST['instruction'];

    $posttime = new DateTime('now');

    // Productオブジェクトを生成する
    require_once __DIR__ . '/../classes/product.php';
    $product = new Product();
    // 選択されたレシピを取り出す
    $before_recipe = $product->getRecipe($recipeId);
    $temp1 = $product->getMaterials($recipeId);
    $before_materials = array_column($temp1, 'material');
    $before_quantities = array_column($temp1, 'quantity');
    $temp2 = $product->getInstructions($recipeId);
    $before_instructions = array_column($temp2, 'instruction');

    session_start();

    // 画像がアップロードされていれば、チェック
    if(!empty($_FILES['image']['tmp_name'])) {
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
                header('Location: recipe_edit.php?recipeId=' . $recipeId);
                exit();
        }

        // サイズなどのチェック
        if($_FILES['image']['error'] === 2) {
            $_SESSION['recipe_error'] = 'ファイルサイズが大きすぎます。';
            header('Location: recipe_edit.php?recipeId=' . $recipeId);
            exit();
        }
        if($_FILES['image']['error'] != UPLOAD_ERR_OK) {
            $_SESSION['recipe_error'] = '画像に関するエラーが発生しました。';
            header('Location: recipe_edit.php?recipeId=' . $recipeId);
            exit();
        }
    }
    
    // Order,Cartオブジェクトを生成する
    require_once __DIR__ . '/../classes/order.php';
    $order = new Order();
    require_once __DIR__ . '/../classes/cart.php';
    $cart = new Cart();

    // 材料テーブルの更新
    $m_array = array();
    $q_array = array();
    foreach($materials as $index => $material) {
        if(!empty($material) && !empty($quantities[$index])) {
            $m_array[] = $material;
            $q_array[] = $quantities[$index];
        }
    }
    $isChanged = 0;
    if($m_array !== $before_materials) { $isChanged = 1; }
    if($q_array !== $before_quantities) { $isChanged = 1; }
    if($isChanged === 1) {
        $cart->deletematerial($recipeId);
        foreach($materials as $index => $material) {
            if(!empty($material) && !empty($quantities[$index])) {
                $order->addmaterial($material, $quantities[$index], $recipeId);
            }
        }
    }

    // 手順テーブルの更新
    $i_array = array();
    foreach($instructions as $instruction) {
        if(!empty($instruction)) {
            $i_array[] = $instruction;
        }
    }
    $isChanged = 0;
    if($i_array !== $before_instructions) { $isChanged = 1; }
    if($isChanged === 1) {
        $cart->deleteinstruction($recipeId);
        foreach($instructions as $index => $value) {
            if(!empty($value)) {
                $order->addinstruction($value, $index + 1, $recipeId);
            }
        }
    }
    
    // 画像がアップロードされていればファイル名を取得、重複しないよう変更して更新
    if(!empty($_FILES['image']['tmp_name'])) {
        $cart->deleteimage($recipeId);
        $imageName = $recipeId . $_FILES['image']['name'];
        $dir = '../images/';
        try{
            if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])){
                move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $imageName);
            }
        }catch(Exception $e) {
            $_SESSION['recipe_error'] = '画像保存中にエラーが発生しました。';
		    header('Location: recipe_edit.php?recipeId=' . $recipeId);
		    exit();
        }
        $order->addimage($imageName, $recipeId);
    }

    // レシピテーブルの更新(日時変更のため必ず行う)
    $cart->updaterecipe($title, $poster, $comment, $servings, $posttime, $recipeId);

    
    $order->createview();
    header('Location: ../family_foods/recipe_list.php');
