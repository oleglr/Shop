<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2017
 * Time: 22:47
 */

namespace app\controllers;

use app\base\App;


/**
 * Категории
 * Вывод товаров в категории
 * возможность добавлять товар в корзину
 *
 * Class CategoryController
 * @package app\controllers
 */
final class CategoryController extends Controller
{
    /**
     *
     */
    public function actionView()
    {
        $idCategory = App::call()->request->getParams();
        $category = App::call()->category->getOne($idCategory);
        $products = $this->getModel()->getProductsByCategory($idCategory);
        $img = [];
        foreach ($products as $product) {
            $images = App::call()->product->getImg($product->id);
            $img[$product->id] = (!empty($images[0]->small)) ? $images[0]->small : false;
        }
        App::call()->shop->setBasket();
        echo $this->render("{$this->controllerName}/$this->actionName", [
            'products' => $products,
            'img' => $img,
            'category' => $category
        ]);
    }

    /**
     * @return \app\models\Category|mixed
     */
    private function getModel()
    {
        return App::call()->category;
    }
}
