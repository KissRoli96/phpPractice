<?php

$di = \PhpPractice\Helpers\Di::getSingleton();

$router = new \PhpPractice\Helpers\Router();

$di->set('router',$router);