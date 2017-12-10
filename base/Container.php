<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.12.2017
 * Time: 20:56
 */

namespace app\base;


class Container
{
    private $items = [];

    public function set(){

    }

    public function get($key){
        if(!isset($this->items[$key])){
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }

}