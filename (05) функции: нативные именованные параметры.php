<?php
/*
    нативные параметры не позволят:
        1. быстро отладить ввод в функцию через print_r
        2. задать генерируемый параметр
        3. пробросить большой кусок данных через & (критично для dixie)
        4. вернуть результат с & : $p = []; function one(&$pparams){ $pparams["result"] = 100; }
        5. прототипировать, - задавать параметры которые не обрабатываются
        6. адекватно работать с интеллисенс, если параметров слишком много
*/
function test($one = "one", $two = "two", $thr = "thr")
{
    echo $one, PHP_EOL, $two, PHP_EOL, $thr, PHP_EOL;
    echo "---", PHP_EOL;
}

test();
test($thr = "333");
test($two = "222");
