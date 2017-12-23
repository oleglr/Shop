<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.12.2017
 * Time: 20:17
 */

return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT']."/../",
    'controller_namespace' => 'app\controllers\\',
    'defaultController' => 'product',
    'defaultAction' => 'index',
    'useLayout' => true,
    'layout' => 'main',
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
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'comment' => [
            'class' => \app\models\Comments::class
        ],
        'product' => [
            'class' => \app\models\Product::class
        ],
        'user' => [
            'class' => \app\models\User::class
        ],
        'category' => [
            'class' => \app\models\Category::class
        ],
        'shop' => [
            'class' => \app\controllers\ShopController::class
        ]
    ],
];