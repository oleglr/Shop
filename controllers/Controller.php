<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:17
 */

namespace app\controllers;

/**
 * Запуск FrontController c обработкой request запроса в браузере
 * Рендеринг шаблона, вывод на экран
 *
 * Class Controller
 * @package app\controllers
 * @property string controllerName
 * @property string actionName
 */
class Controller
{
    protected $controllerName;
    protected $actionName;
    private $defaultAction = 'index';


    public function runAction($controller = null, $action = null)
    {
        $this->controllerName = $controller;
        $this->actionName = $action ?: $this->defaultAction;
        $action = "action" . ucfirst($this->actionName);
        //формируем имя actiona и запускаем как метод вызываемого класса
        $this->$action();
    }

    protected function redirect($url)
    {
        header("Location: /$url");
    }


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