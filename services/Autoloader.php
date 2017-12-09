<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:22
 */

namespace app\services;


use app\base\App;

class Autoloader
{
    private $fileExtinsion = ".php";

    public function loadClass($classname){
        $classname = str_replace("app\\", App::call()->config['root_dir'], $classname);
        $classname = str_replace("\\","/",$classname.$this->fileExtinsion);
        if(file_exists($classname)){
            require $classname;
        }
    }
}