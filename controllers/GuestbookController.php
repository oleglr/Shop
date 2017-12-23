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


/**
 * Отзывы на сайте
 * добавление комментария в БД, вывод шаблона
 *
 * Class GuestbookController
 * @package app\controllers
 */
final class GuestbookController extends Controller
{
    public function actionIndex()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                if (!$this->getModel()->create(
                    [
                        'fio' => trim(strip_tags($_POST['fio'])),
                        'email' => trim(strip_tags($_POST['email'])),
                        'text' => trim(strip_tags($_POST['text'])),
                        'created_at' => $this->getDate()
                    ]
                )
                ) {
                    throw new \Exception("Произошла ошибка");
                }
            } catch (\Exception $e) {
                $e->getMessage();
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