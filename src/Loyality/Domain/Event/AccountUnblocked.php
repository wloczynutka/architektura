<?php
/**
 * Created by PhpStorm.
 * User: Andrzej
 * Date: 09.05.2018
 * Time: 12:46
 */

namespace Loyality\Domain\Event;


class AccountUnblocked extends Event
{
    /**
     * @var int
     */
    private $accountId;

    /**
     * @var string
     */
    private $reason;

    public function __construct(string $accountId, string $reason)
    {
        $this->accountId = $accountId;
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

}