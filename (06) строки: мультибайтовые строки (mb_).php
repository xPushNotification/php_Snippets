<?php
//!---- (PHP): Мультибайтовые Строки:

$str = "ы";
$r =
[
    strlen($str),
    mb_strlen($str),
];

/*
    в мультибайтовых строках семантика
    $str[0] работать просто не будет
    чтобы получить индексы символов строки делаем
    как в JavaScript (разбиваем на РЕАЛЬНЫЙ массив):
*/
$str = "это моя строка";
echo $str[0],PHP_EOL;        // первый байт от 'э'

$str = mb_str_split($str,1); // нарезаем порциям по одному
print_r($str);
echo $str[0];                // корректный 'э'

$str = implode("",$str);     // возврат к строке опять же как в JS
echo $str.PHP_EOL;

?>

