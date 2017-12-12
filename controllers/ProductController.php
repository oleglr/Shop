<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:18
 */

namespace app\controllers;


/**
 * Class ProductController
 * @package app\controllers
 */
final class ProductController extends Controller
{




    public function actionIndex()
    {
        echo "Полный каталог";
    }

    public function actionView()
    {
        echo "Карточка товара";
    }



}