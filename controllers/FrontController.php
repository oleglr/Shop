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
 * Получаем имя контроллера, актион
 * создаем экзмепляр класса на основе полученного имени контроллера и запускам runAction
 * Class FrontController
 * @package app\controllers
 * @property string defaultController
 */
class FrontController extends Controller
{
    private $controller;
    private $defaultController = 'Product';


    protected function actionIndex()
    {
        $request = App::call()->request;
        $this->controllerName = $request->getControllerName() ?: $this->defaultController;
        $this->actionName = $request->getActionName();
        $this->controller = App::call()->config['controller_namespace'] . ucfirst($this->controllerName) . 'Controller';
        try {
            (new $this->controller)->runAction($this->controllerName, $this->actionName);
        } catch (\Exception $e) {
            $e->getMessage();
        }



     //   var_dump($this->controllerName);

    }


}