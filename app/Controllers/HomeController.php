<?php

namespace App\Controllers;


class HomeController extends Controller
{
    public function index($req, $res, $args)
    {
        $this->view->render($res, 'default.twig');
    }
}