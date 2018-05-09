<?php

namespace Loyality\Infrastructure;

use Loyality\Domain\Account;
use Loyality\Domain\Accounts;

class InMemory implements Accounts
{
    private $accounts = [];

    public function load(string $id): Account
    {
        // @TODO: Implement load() method.
        return $this->accounts[$id];
    }

    public function save(Account $account): void
    {
        $this->accounts[$account->getId()] = $account;
    }
}
