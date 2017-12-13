<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:19
 */

namespace app\models;

use app\base\App;

/**
 * Class Model
 * @package app\models
 */
abstract class Model
{
    protected $tableName;
    protected $conn;
    protected $entityClass;

    /**
     * Model constructor.
     * @param $conn
     */
    public function __construct()
    {
        $this->conn = App::call()->db;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getOne(int $id)
    {
        return $this->conn->fetchOne("SELECT * FROM {$this->tableName} WHERE id = :id", ['id' => $id],
            $this->entityClass
        );
    }


    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->conn->fetchAll("SELECT * FROM {$this->tableName}",
            $this->entityClass
        );
    }
}