<?php

namespace Loyalty\Domain\PointsCalculation;

use Loyalty\Domain\PointsCalculation;

class Linear implements PointsCalculation
{
    /**
     * @var float
     */
    private $ratio;

    /**
     * Linear constructor.
     * @param float $ratio
     */
    public function __construct(float $ratio)
    {
        $this->ratio = $ratio;
    }

    public function calculate(int $price): int
    {
        return (int)round($price * $this->ratio);
    }
}