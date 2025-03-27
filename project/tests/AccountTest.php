<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__, 1) . "/classes/Account.php";

class AccountTest extends TestCase {
    private Account $acc;
    private float $amount;

    //fixture exécutée avant chaque méthode de test
    public function setUp(): void {
        // Arrange: Given de l'issue 
        $this->acc = new Account(345354353, 500.);
        $this->amount = -100.;
    }

    // public function testSingleValidAccount(): Account {
    //     $this->assertTrue(true);
    //     return new Account(345354353, 500.);
    // }
    
    // méthode de test avec setUp
    public function testAccountWithdrawal(): void
    {
        if ($this->amount <= 0){
            $this->expectException(ValueError::class);
            $this->acc->withdrawal($this->amount);
        }
        else {
            $this->acc->withdrawal(100.);
            $this->assertEquals(400., $this->acc->getBalance());
        }
    }

    /**
     * @depends testSingleValidAccount
     */
    // public function testAccountWithdrawal(Account $acc): void
    // {

    //     $acc->withdrawal(100.);
    //     $this->assertEquals(400., $acc->getBalance());
    // }

    // public function tearDown(): void {
    //     // libération des variables après test
    //     // fermer les cnx (sockets) & fichiers (memory leaks!!)
    // }
}