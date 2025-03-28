
<?php

use PHPUnit\Framework\Attributes\Group;

class Account
{
    private $_id;
    private $balance;

    public function __construct($_id, $balance = 100.)
    {
        $this->_id = $_id;
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    #[Group("Unit")]
    public function withdrawal(float $amount): void
    {
        if ($amount <= 0) {
            throw new ValueError($amount.': valeur négative');
        }
        $this->balance -= $amount;
    }
}
