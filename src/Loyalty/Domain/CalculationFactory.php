<?php

namespace Loyalty\Domain;

use Loyalty\Domain\PointsCalculation\Fixed;
use Loyalty\Domain\PointsCalculation\BlackFriday;
use Loyalty\Domain\PointsCalculation\Linear;

class CalculationFactory
{
    public function create(): PointsCalculation
    {
        $calculation = random_int(0, 10) < 8
            ? new Linear(0.1)
            : new Fixed(10);

        $blackFriday = true;

        if ($blackFriday) {
            $calculation = new BlackFriday(
                new BlackFriday($calculation, 2),
                8
            );
        }

        return $calculation;
    }
}