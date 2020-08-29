<?php

namespace PhpPractice\Helpers;

use PhpPractice\Controllers\ControllerInterface;
use PhpPractice\Controllers\HomeController;
use PhpPractice\Controllers\LoginController;
use PhpPractice\Controllers\LogOutController;
use PhpPractice\Controllers\NotFoundController;
use PhpPractice\Helpers\Router\Route;

class Router implements DiInjectable {

    public function handle($uri = "/"){
        foreach ($this->routes as $route) {
                if($uri == $route->getPattern()) {
                    $class = $route->getController();
                    /** @var ControllerInterface $controller */
                    $controller = new $class();
                    $controller->execute();

                    return;
                }
        }

        $controller = new NotFoundController();
        $controller->execute();
    }

    /**
     * @var Route[]
     */
    protected $routes = [];

    public function __construct()
    {
        $this
            ->addRoute(new Route('/home',Request::METHOD_GET,HomeController::class))
            ->addRoute(new Route('/login',Request::METHOD_GET,LoginController::class))
            ->addRoute(new Route('/logout',Request::METHOD_POST,LogOutController::class));
    }

    public function addRoute(Route $route){
        $this->routes[] = $route;

        return $this;
    }
}