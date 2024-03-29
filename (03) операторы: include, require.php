<?php
//!---- (PHP): Операторы: 'Include' и 'Require':

require("file.php");
require_once("file.php");
include("variable.php");    // прямое включение куска кода

include "file.php";
require "file.php";

/*
    Cценарии "require" внутри файла с "require" могут вызвать
    проблемы (меняется рабочая директория), чтобы это избежать
    лучше использовать или __DIR__ префикс, 
    или использовать конфигурацию с абсолютным путем

    пример такой ошибки
    есть два элемента дикси
    в каждом подключение внутренних файлов делается через 
    require("file_id.php")

    первый элемент дикси 
    делает require второго элемента дикси 
    и во втором элементе дикси стоит require("file_id.php")
    -- так как папка рабочая не сменилась - будет включать 
    file_id.php в папке первого элемента, а не второго
    вот собственно и ошибка.
*/
define("WORK_PATH","/var/www/php");

require("elem.id.php");             // плохо, могут быть проблемы
require(WORK_PATH."/elem.id.php");  // ok
require(__DIR__."/elem.id.php");    // ok
?>

