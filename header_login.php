<?php
    require_once __DIR__ ."/pre.php";
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>FF</title>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav class="navbar navbar-expand-sm sticky-top navbar-dark mt-3 mb-3" style="background-color: #652600;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a><img src="\FF\images\logo_icon.png" width="50" height="50"><font size="5"color="white"> Family Foods</font></a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="//localhost/FF/family_foods/recipe_list.php"class="nav-link">
                    <font size="4"color="white"
                    onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration=''">
                    投稿レシピ一覧</font></a>
                </li>

                <li class="nav-item active">
                    <a href="//localhost/FF/user/logout.php" class="nav-link">
                    <font size="4"color="white"
                    onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration=''">
                    ログアウト</font></a>
                </li>
            </ul>
        </div>
    </nav>    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $shop_css ?>">
    </head>
<body>
    <div class="main">
       <h2>遠く離れた家族と同じ味を食べよう</h2>

    </ul>
    <hr>