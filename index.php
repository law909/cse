<?php

require "vendor/autoload.php";

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = \cse\store::getRouter();

require_once 'routes.php';

$match = $router->match();
if ($match) {
    callTheController($match['target'], $match);
}

function callTheController($target, $params)
{
    if ($target) {
        $methodname = '';
        $a = explode('#', $target);
        $classname = $a[0];
        if (count($a) > 1) {
            $methodname = $a[1];
        }
        if (strpos($classname, '\\') === false) {
            $classname = '\controllers\\' . $classname;
        }
        $path = explode('/', str_replace('\\', '/', $classname . '.php'));
        $inc = ltrim(implode('/', $path), '/');
        if (file_exists($inc) && $methodname) {
            require_once $inc;
            $instance = new $classname(new \cse\ParameterHandler($params));
            $instance->$methodname();
            return true;
        }
    }
    return false;
}
