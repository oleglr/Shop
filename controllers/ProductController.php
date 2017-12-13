<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:18
 */

namespace app\controllers;

use app\base\App;
use app\models\Product;

/**
 * Class ProductController
 * @package app\controllers
 */
final class ProductController extends Controller
{

    public function actionIndex()
    {
        echo "Полный каталог";
        $products = $this->getModel()->getAll();
        var_dump($products);
    }

    public function actionView()
    {
        $id = App::call()->request->getParams();
        if(!$product = $this->getModel()->getOne($id)){
            throw new \Exception("Нет такой страницы");
        }
      //  return $product;
        var_dump($product);
    }

    private function getModel()
    {
        return new Product();
    }



}