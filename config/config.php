<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:17
 */

return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT']."/../",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'myShop',
            'charset' => 'UTF8'
        ],
        'main' => [
            'class' => \app\controllers\FrontController::class
        ]
    ],
];