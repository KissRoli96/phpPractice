<?php

namespace PhpPractice\Helpers;

class Di{

    protected  $dependencies = [];

    protected static $di;

    /**
     * @return Di
     */
    public static function getSingleton() {
        if (Di::$di === NULL) {
            Di::$di = new Di();
        }

        return Di::$di;
    }

    public function get(string $name){
        if(isset($this->dependencies[$name])) {
            return $this->dependencies[$name];
        }
        throw new \LogicException('invalid Di key given');
    }

    public function set(string $name,DiInjectable $object){
        $this->dependencies[$name] = $object;

        return $this;
    }

}