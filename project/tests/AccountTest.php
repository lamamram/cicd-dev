<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__, 1) . "/classes/Account.php";

class AccountTest extends TestCase {
    public function testAccountWithdrawal(): void
    {
        // Arrange: Given de l'issue 
        $acc = new Account(345354353, 500.);
        // Act: When de l'issue
        $acc->withdrawal(100.);
        // Assert: Then de l'issue
        $this->assertEquals(400., $acc->getBalance());
    }
}