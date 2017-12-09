<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:23
 */

namespace app\traits;


trait TSingleton
{
    private static $instance = null;

    public function __construct(){}
    public function __clone(){}
    public function __wakeup(){}

    public static function getInstance(){
        if(is_null(static::$instance)){
            self::$instance = new static();
        }
        return self::$instance;
    }
}