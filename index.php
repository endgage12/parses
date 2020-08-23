<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/general.css" rel="stylesheet">
    <title>Parse.s</title>
</head>
<body>
    <a href="calc.php">Calc</a>
</body>
</html>

<?php
include_once 'libs/simple_html_dom.php';

class SiteClass {
    function __construct($url, $list, $price, $title) {
        $__url = $url;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //Устанавливаем ссылку
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Передаем результат в качестве строки
        $answer = curl_exec($ch);

        $dom = new simple_html_dom();
        $html = str_get_html($answer);
        $__list = $html->find($list);
        $__price = $html->find($price);

        echo "<h3>" . $title . "</h3>";
        echo "<table>";
        echo "<tr>";
        foreach ($__list as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($__price as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
}

$happyZoo = new SiteClass("http://happy-zoo.ru/dlya-koshek/sukhoj-korm-1", ".center_block", ".PricesalesPrice", "Happy-zoo.ru");

$planetazoo = new SiteClass("https://gorod-zoo.su/%D0%A1%D1%83%D1%85%D0%BE%D0%B9-%D0%BA%D0%BE%D1%80%D0%BC-c39413068", "div.grid-product__title-inner", "div.grid-product__price-value ec-price-item", "Z.Z.ru");

// //Сайт для парсинга
// $url = "http://happy-zoo.ru/dlya-koshek/sukhoj-korm-1";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url); //Устанавливаем ссылку
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Передаем результат в качестве строки
// $answer = curl_exec($ch);

// $dom = new simple_html_dom();
// $html = str_get_html($answer);
// $list = $html->find(".center_block");
// $price = $html->find(".PricesalesPrice");
// echo "<h3>Happy-zoo.ru</h3>";
// echo "<table>";
// echo "<tr>";
// foreach ($list as $key => $value) {
//     echo "<td>" . $value . "</td>";
// }
// echo "</tr>";
// echo "<tr>";
// foreach ($price as $key => $value) {
//     echo "<td>" . $value . "</td>";
// }
// echo "</tr>";
// echo "</table>";

?>