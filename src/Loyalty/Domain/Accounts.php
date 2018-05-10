<?php

namespace Loyalty\Domain;

interface Accounts
{
    public function load(string $id): Account;

    public function save(Account $account): void;
}