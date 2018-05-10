<?php

namespace Loyalty\Infrastructure;

use Loyalty\Domain\Account;
use Loyalty\Domain\Accounts;

class File implements Accounts
{
    /**
     * @var string
     */
    private $path;

    /**
     * File constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function load(string $id): Account
    {
        return unserialize(
            file_get_contents($this->path . '/' . $id)
        );
    }

    public function save(Account $account): void
    {
        file_put_contents(
            $this->path . '/' . $account->getId(),
            serialize($account)
        );
    }
}