<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:20
 */

namespace app\models;


class Product extends Model
{

    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "products";
        $this->entityClass = Product::class;
    }
}