<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2017
 * Time: 10:49
 */

namespace app\controllers;


/**
 * Контакты
 *
 * Class ContactController
 * @package app\controllers
 */
final class ContactController extends Controller
{
    public function actionIndex()
    {
        echo $this->render("{$this->controllerName}/$this->actionName");
    }
}