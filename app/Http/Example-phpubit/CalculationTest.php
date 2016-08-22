<?php

include_once 'Calculation.php';
include_once 'NullParameterExeption.php';

class CalculationTest extends PHPUnit_Framework_TestCase {
    private $caculator;
    public function setUp() {
        parent::setUp();
        $this->caculator = new Calculation();
    }
    
    public function tearDown() {
        parent::tearDown();
        
    }
    function addDataProvider(){
        return array(
            array(4, 1, 3),
            array(2, 1, 1),
        );
    }
    function addExceptionDataProvider() {
        return array(
            array(1, NULL),
            array(NULL, 1),
            array(NULL, NULL)
        );
    }
    /** @dataProvider addDataProvider */
    function test_add($expect_resuld, $a, $b) {
        $this->assertEquals($expect_resuld,  $this->caculator->add($a, $b));
    }
    function addProviderMemory() {
        return array(
            array(1, 1),
            array(3, 3),
            array(4, 1),
        );
    }
    /** @dataProvider addProviderMemory */
    function testAddToMemory($expected, $a){
        $this->assertEquals($expected, $this->caculator->addMemory($a) );
    }
    /** @dataProvider addExceptionDataProvider */
    /** @expectedException NullParameterExeption */
    function testAddException($a, $b){
        $this->caculator->add($a, $b);
    }
}

