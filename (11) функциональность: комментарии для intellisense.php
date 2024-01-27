<?php
//!---- (PHP): Комментарии для Intellisense:
/*
    Комментарии для Intellisense и есть по сути документация к системе
    1. то что касается классов - размещается в зоне комментария к классу
    2. то что касается метода - размещается к методу
    3. то что касается примера использования - размещается в секции примера

    Комментарий не задается к методам, работа которых и так очевидна
*/

//! TheVariableTest:
/**
 * TheVariableTest используется для ПРОТОТИПИРОВАНИЯ моделей 
 * и используется одновременно как ШАБЛОН поля для TheModel (через метаданные), 
 * и как ХРАНИЛИЩЕ поля (через $data) - так как все описатели статические, в экземпляре 
 * кроме данных ничего не храниться.
 * ---
 * Вообще логика была бы более очевидной, если бы были два класса \
 * ..Meta - где бы хранились метаданные \
 * и ..Data, создаваемая на основе этих метаданных, \
 * поэтому класс выглядит несколько дисбалансным 
 * ---
 * Использование:
 * ---
 * Подразумевается, что вы сначала создаете прототип переменной с общими параметрами 
 * после чего добавляете на неё характеристик из разделов характеристик метаданных
 * ---
 * Пример:
 * ---
 *    -- установка основных данных: \
 *    $var = new TheVariableTest($pparams = [ \
 *       "name"=>"one", "modelname"=>"two", \
 *       "type"=>"string", \
 *       "whatIsIt"=>"enum", \
 *       "DF" => "yes", \
 *       "list"=> ["msk", "spb"], \
 *       "default"=> "nn", \
 *       "isConstant"=>"yes", \
 *       "comment" => "первая тестовая переменная", \
 *       ]); \
 *   -- добавление характеристик: \
 *   $var->setAsMandatory();
*/
class TheVariableTest
{
    //!TheVariableTest::test()
    /**
     * Переменная может быть сгенерирована из другой: для этого: переменная1 = generationBase, 
     * переменная2 = generationRecepient, переменная1 = "Smith", переменная1 устанавливается себя как ->setAsGenerationBase, 
     * переменная2 устанавливает себя как ->setAsGenerationRecepient и устанавливает зависимость от переменной1; 
     * теперь при вызове ->setAndGenerate на переменную1 - переменная2 - будет сгенерирована с помощью generationFunction, 
     * установленную параметром для ->setAsGenerationRecepient, 
     * если же переменная приходит из базы данных, то вызывается не ->setAndGenerate, а ->set 
     * ---
     * Пример: 
     * ---
     * setAsGenerationRecepient(["baseFieldName"=>"one1", "generationFunction"=>function($pvalue){return $pvalue+1;},]);
     * @param 'baseFieldName' string : поле из которого будет производится генерация (при его установке через setAndGenerate)
     * @param 'generationFunction' callable : функция генерации, формат function(x){return x+1;}
    */
    static function test()
    {}
}