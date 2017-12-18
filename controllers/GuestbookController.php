<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 17.12.2017
 * Time: 23:56
 */

namespace app\controllers;

use app\base\App;
use app\models\Comments;

class GuestbookController extends Controller
{

    public function actionIndex()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!$this->getModel()->create(
                [
                    'fio' => trim(strip_tags($_POST['fio'])),
                    'email' => trim(strip_tags($_POST['email'])),
                    'text' => trim(strip_tags($_POST['text'])),
                    'created_at' => trim(strip_tags($this->getDate()))
                ]
            )){
                return false;
            }
            $this->redirect('guestbook');
        }

        $comments = $this->getModel()->getAll();
        echo $this->render("{$this->controllerName}/$this->actionName", [
            'comments' => $comments
        ]);
    }

    private function getModel()
    {
        return App::call()->comment;
    }
}