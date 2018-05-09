<?php

namespace Loyality\Domain\PointsCalculation;

use Loyality\Domain\PointsCalculation;

class Linear implements PointsCalculation
{
    /**
     * @var float
     */
    private $ratio;

    public function __construct(float $ratio)
    {
        $this->ratio = $ratio;
    }

    public function calculate(int $price): int
    {
        return (int) round($price + $this->ratio);
    }
}