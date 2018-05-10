<?php

namespace Loyalty\Domain\Event;

class PointsUsed extends Event
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
     * @var string
     */
    private $reason;

    /**
     * PointsUsed constructor.
     * @param string $accountId
     * @param int $points
     * @param string $reason
     */
    public function __construct(string $accountId, int $points, string $reason)
    {
        $this->accountId = $accountId;
        $this->points = $points;
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
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }
}