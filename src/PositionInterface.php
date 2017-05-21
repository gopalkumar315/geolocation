<?php

namespace HylianShield\Geolocation;

interface PositionInterface
{
    /**
     * Get the latitude coordinate of the current location.
     *
     * @return CoordinateInterface
     */
    public function getLatitude(): CoordinateInterface;

    /**
     * Get the longitude coordinate of the current location.
     *
     * @return CoordinateInterface
     */
    public function getLongitude(): CoordinateInterface;
}
