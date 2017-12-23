<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:19
 */

namespace app\models;

use app\base\App;
use app\services\Db;

/**
 * Абстрактная модель дл выборки записей из БД
 *
 * Class Model
 * @package app\models
 */
abstract class Model
{
    protected $tableName;
    /**
     * @var Db conn
     */
    protected $conn;
    protected $entityClass;
    protected $attributes = [];

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
        return $this->conn->fetchOne("SELECT * FROM {$this->tableName} WHERE status = 1 and id = :id", ['id' => $id],
            $this->entityClass
        );
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->conn->fetchAll("SELECT * FROM {$this->tableName} where status = 1",
            $this->entityClass
        );
    }

    public function create(array $data)
    {
        $dataString = $this->prepareAttributes($data);
        $columns = implode(', ', array_keys($this->attributes));
        if (!empty($this->attributes)) {
            return $this->conn->execute("INSERT INTO {$this->tableName} ({$columns}) VALUES ({$dataString})");
        }
    }

    public function prepareAttributes(array $data)
    {
        $dataString = '';
        foreach ($data as $key => $val) {
            if (in_array($key, static::$fields)) {
                $dataString .= ",'$val'";
                $this->attributes[$key] = $val;
            }
        }
        return substr($dataString, 1);
    }

    public function delete($nameColumn, $valueColumn)
    {
        return $this->conn->execute("DELETE FROM {$this->tableName} WHERE $nameColumn = $valueColumn");
    }
}