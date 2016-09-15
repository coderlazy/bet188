<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'User.php';
/**
 * Description of UserTest
 *
 * @author LazyCode
 */
class UserTest extends PHPUnit_Framework_TestCase{
    public function createBankAccountDataProvider() {
        return array(
            array(10),
            array(20),
        );
    }
    /** @dataProvider createBankAccountDataProvider */
    public function testCreateBankAccount($money) {
        $mockBankAccount = $this->getMockBuilder("BankAccount")
                ->disableOriginalConstructor()
                ->getMock();
        $mockBankAccount->expects($this->once())
                ->method('deposite')
                ->with($money);
        $mockBankAccount->expects($this->once())->method('getBalance')->will($this->returnValue($money));
        $us = new User();
        $us->createBankAccount($mockBankAccount, $money);
        $this->assertEquals($money, $us->getTotalMoney());
    }
    public function testGetTotalMoney() {
        
    }
}
