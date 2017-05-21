<?php

namespace HylianShield\Geolocation\Distance;

class MetricDistance implements DistanceInterface
{
    const UNIT = 'meters';

    /** @var float */
    private $length;

    /**
     * Constructor.
     *
     * @param float $length
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * Get the length of the distance.
     *
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * Get the unit in which the length of the distance is expressed.
     *
     * @return string
     */
    public function getUnit(): string
    {
        return static::UNIT;
    }
}
