<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:20
 */

namespace app\models;


class User extends Model
{
    protected static $fields = [
        'name',
        'login',
        'password',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
        $this->entityClass = User::class;
    }

}