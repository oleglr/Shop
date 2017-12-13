<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.12.2017
 * Time: 20:06
 */

namespace app\controllers;

use app\base\App;

/**
 * Роутинг приложения
 * Получаем имя контроллера, актион
 * создаем экзмепляр класса на основе полученного имени контроллера и запускам runAction
 * Class FrontController
 * @package app\controllers
 * @property string defaultController
 */
class FrontController extends Controller
{
    private $controller;
    private $defaultController = 'product';  //перенести в конфиг

    protected function actionIndex()
    {
        $request = App::call()->request;
        $this->controllerName = $request->getControllerName() ?: $this->defaultController;
        $this->actionName = $request->getActionName();
        $this->controller = App::call()->config['controller_namespace'] . ucfirst($this->controllerName) . 'Controller';
        $controller = new $this->controller();
        try {
            $controller->runAction($this->controllerName, $this->actionName);
        } catch (\Exception $e) {
            $this->redirect('product');
        }

    }


}