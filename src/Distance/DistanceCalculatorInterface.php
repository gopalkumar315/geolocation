<?php

namespace HylianShield\Geolocation\Distance;

use HylianShield\Geolocation\PositionInterface;

interface DistanceCalculatorInterface
{
    /**
     * Calculate the distance between two positions.
     *
     * @param PositionInterface $start
     * @param PositionInterface $end
     *
     * @return DistanceInterface
     */
    public function calculate(
        PositionInterface $start,
        PositionInterface $end
    ): DistanceInterface;
}
