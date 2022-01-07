<?php
    require_once __DIR__ ."/pre.php";

echo "<!DOCTYPE html>\n";
echo "<html lang=\"ja\">\n";
echo "<head>\n";
echo "<meta charset=\"UTF-8\">\n";
echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
echo "<title>Family Foods</title>\n";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "<meta name=\"description\" content=\"ここにサイト説明を入れます\">\n";
echo "<meta name=\"keywords\" content=\"キーワード１,キーワード２,キーワード３,キーワード４,キーワード５\">\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "<script src=\"js/fixmenu_pagetop.js\"></script>\n";
echo "<!--[if lt IE 9]>\n";
echo "<script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>\n";
echo "<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>\n";
echo "<![endif]-->\n";
echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>\n";
echo "<script>\n";
echo "$(function(){\n";
echo "$('a[href^=\"#\"]').click(function() {\n";
echo "var speed = 800;\n";
echo "var href= $(this).attr(\"href\");\n";
echo "var target = $(href == \"#\" || href == \"\" ? 'html' : href);\n";
echo "var position = target.offset().top;\n";
echo "$('body,html').animate({scrollTop:position}, speed, 'swing');\n";
echo "return false;\n";
echo "});\n";
echo "});\n";
echo "</script>\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
echo "\n";
echo "<header>\n";
echo "<h1 id=\"logo\"><a href='" . $index_php . "'><img src=\"images/logo.png\" alt=\"SAMPLE COMPANY\"></a></h1>\n";
echo "<nav id=\"menubar\">\n";
echo "<ul>\n";
echo "<li><a href=\"#new\">Family Foodsとは</a></li>\n";
echo "<!-- <li><a href=\"#company\">Company</a></li>\n";
echo "<li><a href=\"#service\">Service</a></li>\n";
echo "<li><a href=\"#contact\">Contact</a></li> -->\n";
echo "<li><a href='" . $login_php . "'>ログイン</a></li>\n";
echo "</ul>\n";
echo "</nav>\n";
echo "</header>\n";
echo "\n";
echo "<div id=\"container\">\n";
echo "\n";
echo "<div id=\"contents\">\n";
echo "\n";
echo "<section id=\"new\">\n";
echo "\n";
echo "<h2>Family Foodsとは</h2>\n";
echo "<dl>\n";
//echo "<dt>2020/09/27</dt>\n";
//echo "<dd>初心者向け無料ホームページテンプレートtp_beginner6公開。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
//echo "<dt>20XX/00/00</dt>\n";
//echo "<dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>\n";
?>
<div style="text-align:center">
～遠く離れた家族と同じ味を食べよう～<br><br>
このサイトは『あなたの家庭の味』を『家族で共有』できるレシピサイトです。<br>
家族以外にも『友達』『恋人』などプライベートでレシピを気軽に共有！<br>
家庭の分量表現(ちょい、一周など)も自由に記載でき、共有IDで簡単アクセス！<br><br>
さぁあなたのレシピを登録しよう！<br>
</div>

<?php
echo "</dl>\n";
echo "\n";
echo "</section>";

echo "<footer>\n";
echo "<small>Copyright&copy; <a href=\"index.php\">Family Foods</a> All Rights Reserved.</small>\n";
echo "<span class=\"pr\">《<a href=\"https://template-party.com/\" target=\"_blank\">Web Design:Template-Party</a>》</span>\n";
echo "</footer>";
?>