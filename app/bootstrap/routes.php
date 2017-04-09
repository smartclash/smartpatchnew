<?php

$app->get('/', 'HomeController:index');

$app->post('/login', 'AuthController:getsignup');