<?php

namespace Loyalty\Domain\Event;

class AccountCreated extends Event
{
    /**
     * @var string
     */
    private $accountId;

    /**
     * AccountCreated constructor.
     * @param string $accountId
     */
    public function __construct(string $accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
}