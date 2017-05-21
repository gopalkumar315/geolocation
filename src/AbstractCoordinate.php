<?php

namespace HylianShield\Geolocation;

use InvalidArgumentException;

abstract class AbstractCoordinate implements CoordinateInterface
{
    /**
     * Minimum angular value in degrees.
     */
    const MINIMUM_ANGLE = -1;

    /**
     * Maximum angular value in degrees.
     */
    const MAXIMUM_ANGLE = 1;

    /** @var float */
    private $angle;

    /**
     * Constructor.
     *
     * @param float $angle
     *
     * @throws InvalidArgumentException When $angle
     */
    public function __construct(float $angle)
    {
        if ($angle < static::MINIMUM_ANGLE || $angle > static::MAXIMUM_ANGLE) {
            throw new InvalidArgumentException(
                sprintf(
                    'Angle of %.3f degrees is not accepted. (%d < angle < %d)',
                    $angle,
                    static::MINIMUM_ANGLE,
                    static::MAXIMUM_ANGLE
                )
            );
        }

        $this->angle = $angle;
    }

    /**
     * Get the angular value in degrees for the current coordinate.
     *
     * @return float
     */
    public function getAngle(): float
    {
        return $this->angle;
    }
}
