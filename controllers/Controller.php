<?php

namespace controllers;

use cse\ParameterHandler;

class Controller
{
    /** @var ParameterHandler */
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }
}