<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 19.12.2017
 * Time: 22:11
 */

namespace app\models;


use app\base\App;

/**
 * Class Basket
 * @package app\models
 * @property int id_basket
 * @property int id_product
 * @property string name_product
 * @property int price
 */
class Basket extends Model
{
    protected static $fields = [
        'id_basket',
        'id_product',
        'name_product',
        'price',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'basket';
        $this->entityClass = Basket::class;
    }

//    public function getBasketByAmount(int $idBasket)
//    {
//        return $this->conn->fetchAll("SELECT * FROM {$this->tableName} WHERE id_basket = $idBasket GROUP BY id_product",
//            $this->entityClass
//        );
//    }

    public function getBasket(int $idBasket)
    {
        return $this->conn->fetchAll("SELECT * FROM {$this->tableName} WHERE id_basket = $idBasket ORDER BY id_product",
            $this->entityClass
        );
    }

    public function getCountByProduct($idProduct, $idBasket)
    {
        return $this->conn->fetchAll("SELECT COUNT(*) as count FROM {$this->tableName} WHERE id_product = $idProduct and id_basket = $idBasket ",
            $this->entityClass
        );
    }
}