<?php
/**
 * Created by PhpStorm.
 * User: Andrzej
 * Date: 09.05.2018
 * Time: 12:46
 */

namespace Loyality\Domain\Event;


class AccountCreated extends Event
{

    /**
     * @var int
     */
    private $accountId;

    public function __construct(string $accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

}
