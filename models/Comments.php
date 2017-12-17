<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 17.12.2017
 * Time: 23:59
 */

namespace app\models;


class Comments extends Model
{
    protected static $fields = [
        'fio',
        'email',
        'text',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'comments';
        $this->entityClass = Comments::class;
    }

}