<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:23
 */

namespace app\traits;


/**
 * Trait TSingleton
 * @package app\traits
 */
trait TSingleton
{
    private static $instance = null;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }
}
