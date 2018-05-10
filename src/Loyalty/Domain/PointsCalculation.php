<?php

namespace Loyalty\Domain;

interface PointsCalculation
{
    /**
     * INT JEST UPROSZCZENIEM!
     *
     * @param int $price
     * @return mixed
     */
    public function calculate(int $price): int;
}
