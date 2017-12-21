<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:17
 */

namespace app\controllers;

use app\base\App;
use app\interfaces\IRenderer;
use app\services\Renderer;

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
    protected $defaultAction = 'index';  //перенести в конфиг
    protected $defaultController = 'product';  //перенести в конфиг
    private $useLayout = true;
    private $layout = 'main';
    /** @var Renderer|null  */
    private $renderer = null;
    protected $message = [];


    /**
     * Controller constructor.
     * @param null $renderer
     */
    public function __construct(IRenderer $renderer = null)
    {
        $this->renderer = $renderer;
    }

    public function runAction($controller = null, $action = null)
    {
        $this->controllerName = $controller;
        $this->actionName = $action ?: $this->defaultAction;
        $action = "action" . ucfirst($this->actionName);
        //формируем имя actiona и запускаем как метод вызываемого класса
        $this->$action();
    }

    public function render($template, $params = [])
    {
        if($this->useLayout){
            $categories = App::call()->category->getAll();
            $mBasket = App::call()->shop->miniBasket();
            return $this->renderTemplate("layouts/{$this->layout}",
                [
                    'content' => $this->renderTemplate($template, $params),
                    'categories' => $categories,
                    'mBasket' => $mBasket
                ]
            );
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    private function renderTemplate($template, $params = [])
    {

        return $this->renderer->render($template, $params);
    }

    protected function redirect($url)
    {
        header("Location: /$url");
    }

    public function getDate()
    {
        return date('Y-m-d H-i-s');
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