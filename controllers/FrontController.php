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
 * Class FrontController
 * @package app\controllers
 */
class FrontController extends Controller
{
    private $defaultController = 'User';


    protected function actionIndex(){
        echo "actionIndex";
        $request = App::call()->request;
        $this->controllerName = $request->getControllerName() ?: $this->defaultController;
        $this->actionName = $request->getActionName();

        var_dump($this->controllerName);

    }


}