<?php

class Calculation{
    private $memory;
    
    function __construct() {
        $this->memory = 0;
    }


    public function add($a, $b) {
        return $a + $b;
    }
    
    function addMemory($a) {
        $this->memory += $a;
        return $this->memory;
    }
}

