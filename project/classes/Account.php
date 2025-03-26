
<?php

class Account{
    private $_id;
    private $balance;

    public function __construct($_id, $balance=100.){
        $this->_id = $_id;
        $this->balance = $balance;    
    }

    public function getBalance(): float {
        return 0.;
    }

    public function withdrawal(float $amount): void {

    }
} 