<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 18.12.2017
 * Time: 22:50
 */

namespace app\models;


use app\base\App;

class Category extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'categories';
        $this->entityClass = Category::class;
    }

    public function getProductsByCategory(int $idCategory)
    {
        $tableProducts = App::call()->product->tableName;
        return $this->conn->fetchAll("SELECT * FROM {$tableProducts} WHERE id_category = $idCategory ",
            $this->entityClass
        );
    }


}