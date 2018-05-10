<?php

namespace Loyalty\Domain\Event;

class PointsAdded extends Event
{
    /**
     * @var string
     */
    private $accountId;

    /**
     * @var int
     */
    private $points;

    /**
     * PointsAdded constructor.
     * @param string $accountId
     * @param int $points
     */
    public function __construct(string $accountId, int $points)
    {
        $this->accountId = $accountId;
        $this->points = $points;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }
}