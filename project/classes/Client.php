<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Client
{
    private $_id;
    private $firstname;
    private $lastname;

    public function __construct($_id, $fn, $ln)
    {
        $this->_id = $_id;
        $this->firstname = $fn;
        $this->lastname = $ln;
    }
}
