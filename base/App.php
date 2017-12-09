<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:16
 */

namespace app\base;

use app\traits\TSingleton;

include '../traits/TSingleton.php';

class App
{
    use TSingleton;

    public $config;

    public static function call(){
        return static::getInstance();
    }

    public function run(){
        $this->config = include "../config/config.php";
        $this->autoloadRegister();

    }

    private function autoloadRegister(){
        require '../services/Autoloader.php';
        spl_autoload_register([new \app\services\Autoloader(), "loadClass"]);
    }


}