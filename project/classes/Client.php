<?php

class Client {
    private $_id;
    private $firstname;
    private $lastname;

    public function __construct($_id, $fn, $ln){
        $this->_id = $_id;
        $this->firstname = $fn;
        $this->lastname = $ln;
    }
}