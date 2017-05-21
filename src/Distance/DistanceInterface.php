<?php

namespace HylianShield\Geolocation\Distance;

interface DistanceInterface
{
    /**
     * Get the length of the distance.
     *
     * @return float
     */
    public function getLength(): float;

    /**
     * Get the unit in which the length of the distance is expressed.
     *
     * @return string
     */
    public function getUnit(): string;
}
