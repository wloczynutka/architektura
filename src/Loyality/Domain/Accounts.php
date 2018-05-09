<?php

namespace Loyality\Domain;

interface Accounts
{
    public function save(Account $account): void;
    public function load(string $id): Account;
}