<?php

namespace Loyalty\Infrastructure;

use Loyalty\Domain\Account;
use Loyalty\Domain\Accounts;

class InMemory implements Accounts
{
    private $accounts = [];

    public function load(string $id): Account
    {
        // @todo Fix me :)

        return $this->accounts[$id];
    }

    public function save(Account $account): void
    {
        $this->accounts[$account->getId()] = $account;
    }
}