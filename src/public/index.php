<?php


require_once __DIR__. '/../../vendor/autoload.php';

$di = \PhpPractice\Helpers\Di::getSingleton();

$router = $di->get('router');

$router->handle(isset($_GET['route'])? $_GET['route'] : NULL);
