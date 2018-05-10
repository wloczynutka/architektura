<?php

namespace Loyalty\Domain\PointsCalculation;

use Loyalty\Domain\PointsCalculation;

class Fixed implements PointsCalculation
{
    /**
     * @var int
     */
    private $points;

    /**
     * Fixed constructor.
     * @param int $points
     */
    public function __construct(int $points)
    {
        $this->points = $points;
    }

    public function calculate(int $price): int
    {
        return $this->points;
    }
}