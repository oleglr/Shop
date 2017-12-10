<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:17
 */

namespace app\controllers;


class Controller
{

    public function runAction($controller = null, $action = null)
    {

    }

    public function __set ( $name , $value ) {
        echo "Записать свойство {$name} нельзя, так как его не существует \n";
    }
    public function __get ( $name ) {
        echo "Получить свойство {$name} нельзя, так как его не существует \n";
    }
}