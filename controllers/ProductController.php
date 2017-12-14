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
        $products = $this->getModel()->getAll();
        echo $this->render("{$this->controllerName}/$this->actionName", ['products' => $products]);
    }

    public function actionView()
    {
        $id = App::call()->request->getParams();
        if(!$product = $this->getModel()->getOne($id)){
            throw new \Exception("404");
        }
        echo $this->render("{$this->controllerName}/$this->actionName", ['product' => $product]);
    }

    /**
     * @return Product
     */
    private function getModel()
    {
        return new Product();
    }



}