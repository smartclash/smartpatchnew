<?php

namespace App;


class Middleware
{
    protected $conainer;

    public function __construct($container)
    {
        $this->conainer = $container;
    }

    public function __get($prop)
    {
        if($this->conainer->{$prop})
            return $this->conainer->{$prop};
    }
}