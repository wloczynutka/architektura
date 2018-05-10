<?php

namespace Loyalty\Infrastructure;

use Gaufrette\Filesystem;
use Loyalty\Domain\Account;
use Loyalty\Domain\Accounts;

class BetterFile implements Accounts
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * BetterFile constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }


    public function load(string $id): Account
    {
        return unserialize($this->filesystem->read($id));
    }

    public function save(Account $account): void
    {
        $this->filesystem->write(
            $account->getId(),
            serialize($account),
            true
        );
    }
}