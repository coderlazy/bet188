<?php
include 'BankAccount.php';
class BankAccountTest extends PHPUnit_Framework_TestCase{
    private $backAccount1;
    private $backAccount2;
    
    public function setUp() {
        parent::setUp();
        $this->backAccount1 = new BankAccount(1);
        $this->backAccount2 = new BankAccount(2);
    }
    
    public function addPrividerDataDeposite() {
        $bank_account_stub = new BankAccount(0);
        $bank_account_stub->deposite(30);
        return array(
            array($bank_account_stub, 10, 20),
            array($bank_account_stub, 10, 10),
            array($bank_account_stub, 10, 0),
        );
    }
    /** @dataProvider addPrividerDataDeposite */
    public function testDeposit($bank_account_stub, $money, $expected_balance) {
        $bank_account_stub->deposite($money);
        $this->assertEquals($expected_balance,  $bank_account_stub->getBalance());
    }
    /** @dataProvider addPrividerDataDeposite */
    public function testWithDraw($bank_account_stub, $money, $expected_balance) {
        $bank_account_stub->withDraw($money);
        $this->assertEquals($expected_balance,  $bank_account_stub->getBalance());
    }
}

