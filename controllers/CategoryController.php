<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2017
 * Time: 22:47
 */

namespace app\controllers;


use app\base\App;

class CategoryController extends Controller
{
    public function actionView()
    {
        $idCategory = App::call()->request->getParams();
        $products = $this->getModel()->getProductsByCategory($idCategory);
        foreach ($products as $product) {
            $images = App::call()->product->getImg($product->id);
            $img[$product->id] = (!empty($images[0]->small)) ? $images[0]->small : false;
        }
        echo $this->render("{$this->controllerName}/$this->actionName", [
            'products' => $products,
            'img' => $img
        ]);
    }

    private function getModel()
    {
        return App::call()->category;
    }
}