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
 * Используем Синглтон для одиночного подключения класса
 * автозагрузчик файлов
 * используем магический метод get для подключения компонентов прописанных в конфиге
 * запускаем FrontController для обработки строки(controller/action/id) переданной в бразуер
 * @property Controller main
 * @property Db db
 */
class App
{
    use TSingleton;

    public $config;
    private $items = [];
    private $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run()
    {
        //подгружаем массив конфига
        $this->config = include "../config/config.php";
        //запускаем автозагрузчик файлов
        $this->autoloadRegister();
        //запускаем FrontController
        $this->main->runAction();
    }

    private function autoloadRegister()
    {
        require '../services/Autoloader.php';
        spl_autoload_register([new \app\services\Autoloader(), "loadClass"]);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    private function get($key)
    {
        if (!isset($this->items[$key])) {
            $this->items[$key] = $this->createComponent($key);
        }
        return $this->items[$key];
    }

    private function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $className = $params['class'];
            if (class_exists($className)) {
                //реализуем подгрузку компонента для создания экзмепляра и загрузки свойств в конструктор(например для класса Db)
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $this->components = $reflection->newInstanceArgs($params);
            }
            throw new \Exception("Класс $className не был найден");
        }
        throw new \Exception("Компонент $name не существует в config.php");
    }
}