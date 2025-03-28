<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__, 1).'/classes/Account.php';

#[CoversClass(Account::class)]
class AccountTest extends TestCase
{
    private Account $acc;
    private float $amount;

    // fixture exécutée avant chaque méthode de test
    // public function setUp(): void {
    //     // Arrange: Given de l'issue
    //     $this->acc = new Account(345354353, 500.);
    //     $this->amount = -100.;
    // }

    public static function amountProvider()
    {
        $fixturePath = dirname(__DIR__, 1).'/tests/fixtures/';
        $file = file_get_contents($fixturePath.'amounts.csv', 'r');
        foreach (explode("\n", $file) as $line) {
            $data[] = explode(',', $line);
        }

        return $data;
    }

    // public function testSingleValidAccount(): Account {
    //     $this->assertTrue(true);
    //     return new Account(345354353, 500.);
    // }

    // méthode de test avec setUp
    // public function testAccountWithdrawal(): void
    // {
    //     if ($this->amount <= 0){
    //         $this->expectException(ValueError::class);
    //         $this->acc->withdrawal($this->amount);
    //     }
    //     else {
    //         $this->acc->withdrawal(100.);
    //         $this->assertEquals(400., $this->acc->getBalance());
    //     }
    // }

    /**
     * @depends testSingleValidAccount
     */
    // public function testAccountWithdrawal(Account $acc): void
    // {

    //     $acc->withdrawal(100.);
    //     $this->assertEquals(400., $acc->getBalance());
    // }

    #[DataProvider('amountProvider')]
    #[Test]
    #[Group("Unit")]
    public function accountWithdrawal(string $_id, string $balance, string $amount): void
    {
        $acc = new Account((int) $_id, (float) $balance);
        if ($amount <= 0) {
            $this->expectException(ValueError::class);
            $acc->withdrawal((float) $amount);
        } else {
            $acc->withdrawal((float) $amount);
            $this->assertSame($balance - $amount, $acc->getBalance());
        }
    }

    // public function tearDown(): void {
    //     // libération des variables après test
    //     // fermer les cnx (sockets) & fichiers (memory leaks!!)
    // }
}
