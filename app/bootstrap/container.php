<?php

$container['view'] = function($container)
{
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        //'cache' => __DIR__ . '/../storage/cache/views'
    ]);

    $basePath = rtrim(str_ireplace('index.php', '',
        $container['request']->getUri()->getBasePath()), '/');

    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['HomeController'] = function($container)
{
    return new \App\Controllers\HomeController($container);
};

$container['db'] = function($container)
{
    return new \Medoo\Medoo($container['settings']['db']);
};

$container['AuthController'] = function($container)
{
    return new \App\Controllers\AuthController($container);
};