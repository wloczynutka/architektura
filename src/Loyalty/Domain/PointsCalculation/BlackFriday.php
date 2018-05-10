<?php

namespace Loyalty\Domain\PointsCalculation;

use Loyalty\Domain\PointsCalculation;

class BlackFriday implements PointsCalculation
{
    /**
     * @var PointsCalculation
     */
    private $calculation;

    /**
     * @var float
     */
    private $multiplier;

    /**
     * BlackFriday constructor.
     * @param PointsCalculation $calculation
     * @param float $multiplier
     */
    public function __construct(PointsCalculation $calculation, float $multiplier)
    {
        $this->calculation = $calculation;
        $this->multiplier = $multiplier;
    }

    public function calculate(int $price): int
    {
        return (int)round($this->calculation->calculate($price) * $this->multiplier);
    }
}