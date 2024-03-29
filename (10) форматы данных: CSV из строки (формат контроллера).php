<?php
//!---- (PHP): Форматы: CSV (comma separated values) из строки:

/*
    разберем параллельно как строиться правильный контроллер
    обрабатывающий данные.

    в нем:
    1. модель шага подгоняются в шапку шага
    2. каждый шаг завершается промежуточными данными
    3. в каждом шаге не больше двух логических шагов
    4. шаги нормально подписаны
    5. переменные адекватно названы
*/

//! [csv:1] Базовые данные:
// -------------------------------------
$table = [];
$csv = <<< DOC
Year,Make,Model,Length
1997,Ford,E350,2.35
2000,Mercury,Cougar,111,222,333,444
2001,Audi,TT
DOC;

//! [csv:2] Преобразуем данные в 2Д массив:
// -------------------------------------
//? когда мы находимся на шаге контроллер, мы точно знаем, что нет ошибок в данных:
$csvRows = [];      // уделяем внимание определениям данным
$csvRows = str_getcsv($csv, "\n");  // получаем строки

foreach($csvRows as &$row)   // перебираем строки по ссылке
{
    $row = str_getcsv($row, ",");
}

//! [csv:3] Получаем заголовок (#strings > 1):
// -------------------------------------
$headerCols = [];
if(count($csvRows) > 1)
{
    $headerCols = array_shift($csvRows);
}
// print_r($header);        // на каждом шаге данные разделены

//! [csv:4] Выявление не существующих или избыточных ячеек:
// -------------------------------------
//? для сохранения логики прозрачной, больше двух логических шагов не объединяются
$placeholder = "--";        // никакого хардкода, данные в модель!
foreach($csvRows as &$row)
{
    if(count($headerCols) > count($row))
    {
        for($i=0; $i<count($headerCols); $i++)
        {
            if(!isset($row[$i])) {$row[$i] = $placeholder;}
        }
    }
    while(count($row) > count($headerCols)) {array_pop($row);}
}
// print_r($csvRows);

//! [csv:5] Меняем ключи массива на ключи заголовка:
// -------------------------------------
//? сложная для чтения контструкция снабжена заголовоком:
foreach($csvRows as &$row)
{
    $index = 0;
    $temp = [];
    foreach($row as $k=>$v) {$temp[$headerCols[$index++]] = $v;}
    $row = $temp;        // не '$row = &$temp'
}
//print_r($csvRows);

//! [csv:6] Очистка:
// -------------------------------------
unset($headerCols);
unset($csv);
$table = &$csvRows;

//! [csv:7] Результаты::
// -------------------------------------
print_r($table);
?>

