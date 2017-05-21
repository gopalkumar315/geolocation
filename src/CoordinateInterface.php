<?php
namespace HylianShield\Geolocation;

interface CoordinateInterface
{
    /**
     * Get the angular value in degrees for the current coordinate.
     *
     * @return float
     */
    public function getAngle(): float;
}
