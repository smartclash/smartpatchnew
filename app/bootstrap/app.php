<?php

require __DIR__ . '/../../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,

        'db' => [
            'database_type' => 'mysql',
            'database_name' => 'smartcla_patchy',
            'server'        => '31.220.17.160',
            'username'      => 'smartcla_deploy',
            'password'      => 'deploy',
            'charset'       => 'utf8',
        ],
    ],
]);

$container = $app->getContainer();

require 'container.php';

require 'routes.php';
