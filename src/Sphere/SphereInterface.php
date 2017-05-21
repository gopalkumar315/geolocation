<?php

namespace HylianShield\Geolocation\Sphere;

interface SphereInterface
{
    /**
     * Get the radius of the sphere in meters.
     *
     * @return float
     */
    public function getRadius(): float;
}
