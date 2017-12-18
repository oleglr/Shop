<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2017
 * Time: 10:49
 */

namespace app\controllers;


class ContactController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("{$this->controllerName}/$this->actionName");
    }
}