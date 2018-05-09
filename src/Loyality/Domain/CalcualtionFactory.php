<?php

namespace Loyality\Domain;


use Loyality\Domain\PointsCalculation\BlackFriday;
use Loyality\Domain\PointsCalculation\Linear;

class CalcualtionFactory
{
    public function create()
    {
        $calculation = new Linear(0.1);

        d('tmp blackfriday');
        $blakFriday = true;
        if ($blakFriday) {
            $calculation = new BlackFriday($calculation, 2);
        }
        return $calculation;
    }
}
