<?php
//!---- (PHP): Массивы: Часть Массива:

$arr = [1,2,3,4,5,6];
$r = array_slice(
    $arr,
    1,2,            // старт.индекс, длина
    true            // сохранять ли ключи
);

print_r($r);        // 2,3
?>

