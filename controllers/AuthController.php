<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 16.12.2017
 * Time: 17:34
 */

namespace app\controllers;

use app\models\User;
use app\services\Auth;

class AuthController extends Controller
{

    public function actionIndex()
    {
        $this->redirect('./');
    }

    public function actionLogin()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!$user = $this->getModel()->getByLoginPass(trim(strip_tags($_POST['login'])), trim(strip_tags($_POST['password'])))){
                $message = "Вы ввели не корректные данные!";
                echo $this->render("{$this->controllerName}/$this->actionName", ['message' => $message]);
                return false;
            }
            (new Auth())->openSession($user);
            $this->redirect('product');
        }
        echo $this->render("{$this->controllerName}/$this->actionName");
    }

    public function actionLogout()
    {
        unset($_SESSION['sid']);
        session_destroy();
        $this->redirect('product');
    }

    public function actionSignup()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($this->getModel()->create(
                [
                    'name' => trim(strip_tags($_POST['name'])),
                    'login' => trim(strip_tags($_POST['login'])),
                    'password' => md5(trim(strip_tags($_POST['password']))),
                    'created_at' => trim(strip_tags($this->getDate()))
                ]
            )
            ){
                if(!$user = $this->getModel()->getByLoginPass(trim(strip_tags($_POST['login'])), trim(strip_tags($_POST['password'])))){
                    return false;
                }
                (new Auth())->openSession($user);
                $this->redirect('product');
            }
        } else {
            echo $this->render("{$this->controllerName}/$this->actionName");
        }
    }

    private function getModel()
    {
        return new User();
    }
    
}