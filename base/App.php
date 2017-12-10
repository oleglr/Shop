<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:16
 */

namespace app\base;

include '../traits/TSingleton.php';

use app\controllers\Controller;
use app\services\Db;
use app\traits\TSingleton;

/**
 * Class App
 * @package app\base
 * @property Controller main
 * @property Db db
 */
class App
{
    use TSingleton;

    public $config;

    /** @var  Container */
    private $components;

    public static function call(){
        return static::getInstance();
    }

    public function run(){
        //подгружаем массив конфига
        $this->config = include "../config/config.php";
        //запускаем автозагрузчик файлов
        $this->autoloadRegister();
        //подгружаем класс для записи и получения экземпляров классов в конфиге
        $this->components = new Container();
        //запускаем FrontController
        $this->main->runAction();
    }

    private function autoloadRegister(){
        require '../services/Autoloader.php';
        spl_autoload_register([new \app\services\Autoloader(), "loadClass"]);
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }


    public function createComponent($name){
        if(isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];
            $className = $params['class'];
            if(class_exists($className)){
                //реализуем подгрузку компонента для создания экзмепляра и загрузки свойств в конструктор(например для класса Db)
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $reflection->newInstanceArgs($params);
            }
        }
        throw new \Exception("Компонент $name не существует в config.php");
    }


}