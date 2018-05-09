<?php

namespace Loyality\Domain\Event;

class PointsAdded extends Event
{
    /**
     * @var int
     */
    private $accountId;

    /**
     * @var string
     */
    private $points;

    public function __construct(string $accountId, string $points)
    {
        $this->accountId = $accountId;
        $this->points = $points;
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
