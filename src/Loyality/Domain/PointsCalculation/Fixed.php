<?php

namespace Loyality\Domain\PointsCalculation;

use Loyality\Domain\PointsCalculation;

class Fixed implements PointsCalculation
{

    /**
     * @var int
     */
    private $points;

    public function __construct(int $points)
    {
        $this->points = $points;
    }

    public function calculate(int $price): int
    {
        return $this->points;
    }
}
