<?php
//!--- (PHP): Форматирование Чисел:

$number = 1234.5678;
$r = 
[
    number_format($number, 2),      // 1234.57
    number_format("1234.562",2),    // 1234.56 :в пхп авто-преобразование
];

print_r($r);

?>

