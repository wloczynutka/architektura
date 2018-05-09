<?php

namespace Loyality\Domain\PointsCalculation;

use Loyality\Domain\PointsCalculation;

class BlackFriday implements PointsCalculation
{

    /**
     * @var int
     */
    private $calculation;

    private $multiplier;

    public function __construct(PointsCalculation $pointsCalculation, $multiplier)
    {
        $this->calculation = $pointsCalculation;
        $this->multiplier = $multiplier;
    }

    public function calculate(int $price): int
    {
        return (int) round($this->calculation->calculate($price) * $this->multiplier);
    }
}
