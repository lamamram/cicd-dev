<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__, 1) . "/classes/Account.php";

class AccountTest extends TestCase {
    private Account $acc;

    // fixture exécutée avant chaque méthode de test
    public function setUp(): void {
        // Arrange: Given de l'issue 
        $this->acc = new Account(345354353, 500.);
    }
    
    public function testAccountWithdrawal(): void
    {
        // Act: When de l'issue
        $this->acc->withdrawal(100.);
        // Assert: Then de l'issue
        $this->assertEquals(400., $this->acc->getBalance());
    }

    // public function tearDown(): void {
    //     // libération des variables après test
    //     // fermer les cnx (sockets) & fichiers (memory leaks!!)
    // }
}