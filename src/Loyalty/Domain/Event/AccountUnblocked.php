<?php

namespace Loyalty\Domain\Event;

class AccountUnblocked extends Event
{
    /**
     * @var string
     */
    private $accountId;

    /**
     * @var
     */
    private $reason;

    /**
     * AccountUnblocked constructor.
     * @param string $accountId
     * @param $reason
     */
    public function __construct(string $accountId, $reason)
    {
        $this->accountId = $accountId;
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }
}