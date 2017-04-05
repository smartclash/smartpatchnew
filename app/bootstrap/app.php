<?php

require __DIR__ . '/../../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,

        'db' => [
            'database_type' => 'mysql',
            'database_name' => 'patchy',
            'server'        => 'localhost',
            'username'      => 'root',
            'password'      => 'amaramar',
            'charset'       => 'utf8',
        ],
    ],
]);

$container = $app->getContainer();

require 'container.php';

require 'routes.php';
