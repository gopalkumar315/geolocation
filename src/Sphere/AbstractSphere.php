<?php

namespace HylianShield\Geolocation\Sphere;

abstract class AbstractSphere implements SphereInterface
{
    const RADIUS = .0;

    /**
     * Get the radius of the sphere in meters.
     *
     * @return float
     */
    public function getRadius(): float
    {
        return static::RADIUS;
    }
}
