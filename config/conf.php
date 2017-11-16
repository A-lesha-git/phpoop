<?php
return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../",
    'templates_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../views/",
    'controller_namespaces' => '\app\\controllers\\',
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'php_user',
            'password' => 'pass',
            'database' => 'geekshop',
            'charset' => 'UTF8'
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ],
        'auth' => [
            'class' => \app\services\Auth::class
        ],
        'user' => [
            'class' => \app\models\User::class
        ],
        'session' => [
            'class' => \app\services\Session::class
        ],
        'request' => [
            'class' => \app\services\RequestManager::class
        ],
        'sessionRep' => [
            'class' => \app\models\repositories\SessionRepository::class
        ],
        'productRepository' => [
            'class' => \app\models\repositories\ProductRepository::class
        ]
    ]

];