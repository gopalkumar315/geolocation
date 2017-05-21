<?php

namespace HylianShield\Geolocation;

class Position implements PositionInterface
{
    /** @var CoordinateInterface */
    private $latitude;

    /** @var CoordinateInterface */
    private $longitude;

    /**
     * Constructor.
     *
     * @param CoordinateInterface $latitude
     * @param CoordinateInterface $longitude
     */
    public function __construct(
        CoordinateInterface $latitude,
        CoordinateInterface $longitude
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Create a position using the numerical representations of latitude and
     * longitude.
     *
     * @param float $latitude
     * @param float $longitude
     *
     * @return Position
     */
    public static function create(float $latitude, float $longitude): Position
    {
        return new static(
            new Latitude($latitude),
            new Longitude($longitude)
        );
    }

    /**
     * Get the latitude coordinate of the current location.
     *
     * @return CoordinateInterface
     */
    public function getLatitude(): CoordinateInterface
    {
        return $this->latitude;
    }

    /**
     * Get the longitude coordinate of the current location.
     *
     * @return CoordinateInterface
     */
    public function getLongitude(): CoordinateInterface
    {
        return $this->longitude;
    }
}
