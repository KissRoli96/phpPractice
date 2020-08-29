<?php

namespace PhpPractice\Helpers\Router;

class Route{

    protected $pattern;
    protected $method;
    protected $controller;


    public function __construct($pattern,$method,$controller)
    {
        $this->pattern = $pattern;
        $this->method = $method;
        $this->controller = $controller;


    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }


    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }



}
