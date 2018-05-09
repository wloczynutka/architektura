<?php

namespace Loyality\Domain;


interface PointsCalculation
{
    /**
     * @param int $price
     * @return int
     */
    public function calculate(int $price): int;
}
