<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 23.12.2017
 * Time: 23:01
 */

namespace app\traits;


trait TController
{
    public function __call($name, $arguments)
    {
        echo "Вызываемый метод $name не существует";
    }

    public function __set($name, $value)
    {
        echo "Записать свойство {$name} нельзя, так как его не существует \n";
    }

    public function __get($name)
    {
        echo "Получить свойство {$name} нельзя, так как его не существует \n";
    }
}