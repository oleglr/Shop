<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 20.12.2017
 * Time: 22:43
 */

namespace app\controllers;


use app\base\App;
use app\models\Model;

class BasketController extends Controller
{
    private $countAll;
    private $priceAll;
    private $fullBasket;
    private $product;


    public function actionFull()
    {
        $this->prepareBasket();
        $this->fullBasket = $this->getShop()->getModel()->getBasket($this->getShop()->idBasket);

        foreach ($this->fullBasket as $item) {
            $this->priceAll += $item->price;
            $count = $this->getShop()->getModel()->getCountByProduct($item->id_product, $this->getShop()->idBasket);
            $this->product[$item->id_product] = [
                'id' => $item->id_product,
                'name' => $item->name_product,
                'price' => $item->price,
                'count' => $count[0]->count
            ];
        }

        $this->countAll = count($this->fullBasket);
        $data = [
            'countAll' => $this->countAll,
            'price' => $this->priceAll
        ];

        echo $this->render("{$this->controllerName}/$this->actionName", [
            'products' => $this->product,
            'data' => $data
        ]);

    }

    private function prepareBasket()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['clear']) {
                $this->getShop()->getModel()->delete('id_basket', $this->getShop()->idBasket);
                $this->redirect('./');
            }
        }
    }

    private function getShop()
    {
        return App::call()->shop;
    }


}