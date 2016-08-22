<?php

include 'InSufficientBalanceException.php';
//include 'User.php';

class BankAccount{
    private $balance;
    private $id;
    private $user;
    
    public function __construct($id, $user) {
        $this->balance = 0;
        $this->id = $id;
        $this->user = $user;
    }
    public function deposite($money) {
        $this->balance += $money;
    }
    public function withDraw($money) {
          if($this->balance >= $money){
             $this->balance -= $money;
          }else{
              throw  new InSufficientBalanceException();
          }
    }
    public function transfer($id, $money) {
        try{
            $this->withDraw($money);
        }catch(InSufficientBalanceException $exc){
            throw new InSufficientBalanceExceptionTransfer();
        }
    }
    public function getBalance() {
        return $this->balance;
    }
}

