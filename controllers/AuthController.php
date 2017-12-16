<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 16.12.2017
 * Time: 17:34
 */

namespace app\controllers;

use app\models\User;

class AuthController extends Controller
{

    public function actionIndex()
    {
        $this->redirect('./');
    }

    public function actionLogin()
    {
        echo $this->render("{$this->controllerName}/$this->actionName");
    }

    public function actionSignup()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if((new User())->create(
                [
                    'name' => trim(strip_tags($_POST['name'])),
                    'login' => trim(strip_tags($_POST['login'])),
                    'password' => trim(strip_tags($_POST['password'])),
                    'created_at' => trim(strip_tags($this->getDate()))
                ]
            )
            ){
                echo "Регистрация прошла";

//                если пользователь успешно зарегистрирован - то его автоматически авторизовывать на сайте


            }
//
//
//
//
//            if(!$user = (new UserRep())->getByLoginPass($login, $pass)){
//                return false;
//            }
//            $this->openSession($user);
//            return true;

          //  echo "POST";
//            if((new Auth())->login($_POST['login'], $_POST['pass'])){
//                $this->redirect('product');
//            }
        } else {
            echo $this->render("{$this->controllerName}/$this->actionName");
        }

        // echo $this->render("auth/login");
      //
    }
    
}