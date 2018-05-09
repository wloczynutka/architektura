<?php

namespace Loyality\Domain\Event;

class PointsUsed extends Event
{
    /**
     * @var int
     */
    private $accountId;

    /**
     * @var string
     */
    private $points;

    /**
     * @var string
     */
    private $reason;

    public function __construct(string $accountId, string $points, string $reason)
    {
        $this->accountId = $accountId;
        $this->points = $points;
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
    public function getPoints()
    {
        return $this->points;
    }
}
