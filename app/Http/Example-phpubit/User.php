<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author LazyCode
 */
include_once 'BankAccount.php';

class User {
    /** @var BankAccount*/
    private $bankAcount;
    
    public function createBankAccount($bankAcount, $money) {
        $this->bankAcount = $bankAcount;
         $this->bankAcount->deposite($money);
    }
    
    public function deposite($money) {
        $this->bankAcount->deposite($money);
    }
    
    public function getTotalMoney() {
        return $this->bankAcount->getBalance();
    }
}
