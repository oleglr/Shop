<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 19.12.2017
 * Time: 21:15
 */

namespace app\controllers;


use app\base\App;
use app\models\Basket;

class ShopController extends Controller
{
    public $idBasket;
    private $amount = 0;
    private $price = 0;

    public function __construct()
    {
        if (!isset($_COOKIE['idGuest'])) {
            setcookie("idGuest", rand(-1000000, -1000), time() + 3600 * 24 * 7);
        }
        $this->idBasket = (!empty($_SESSION['idUser'])) ? $_SESSION['idUser'] : $_COOKIE['idGuest'];
    }


    public function setBasket()
    {
//        setcookie("idGuest", "", time() + 3600 * 24 * 7);
//        var_dump($_COOKIE);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (!$this->getModel()->create(
                [
                    'id_basket' => $this->idBasket,
                    'id_product' => $_POST['id'],
                    'name_product' => $_POST['name'],
                    'price' => $_POST['price'],
                    'created_at' => $this->getDate()
                ]
            )
            ) {
                return false;
            }


//            var_dump($_POST);
//            var_dump($_SESSION);
//            var_dump($_COOKIE);

        }
    }

    public function miniBasket()
    {
        $mBasket = [
            'amount' => $this->prepareAmount(),
            'price' => $this->preparePrice()
        ];
        return $mBasket;
    }

    private function prepareAmount()
    {
        $this->amount = count($this->getModel()->getBasket($this->idBasket));
        return $this->amount;
    }

    private function preparePrice()
    {
        $priceAll = $this->getModel()->getBasket($this->idBasket);
        foreach ($priceAll as $item) {
            $this->price += $item->price;
        }
        return $this->price;
    }


    public function getModel()
    {
        return new Basket();
    }
}