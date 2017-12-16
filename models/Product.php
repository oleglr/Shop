<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:20
 */

namespace app\models;


/**
 * Товары
 * Class Product
 * @package app\models
 */
class Product extends Model
{
    private $tableNameImg;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'products';
        $this->tableNameImg = 'img_products';
        $this->entityClass = Product::class;
    }

    public function getImg(int $idProduct)
    {
        return $this->conn->fetchAll("SELECT * FROM {$this->tableNameImg} WHERE id_product = $idProduct",
            $this->entityClass
        );
    }




}