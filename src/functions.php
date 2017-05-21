<?php
namespace HylianShield\Geolocation;

use HylianShield\Geolocation\Distance\DistanceCalculatorInterface;
use HylianShield\Geolocation\Distance\MetricDistanceCalculator;
use HylianShield\Geolocation\Sphere\CelestialBody\Earth;

/**
 * Create a position value object for the given coordinates.
 *
 * @param float $latitude
 * @param float $longitude
 *
 * @return PositionInterface
 */
function coordinates(float $latitude, float $longitude): PositionInterface
{
    return Position::create($latitude, $longitude);
}

/**
 * Calculate the metric distance between the given positions.
 *
 * @param PositionInterface $start
 * @param PositionInterface $end
 * @param int               $precision
 *
 * @return float
 */
function distance(
    PositionInterface $start,
    PositionInterface $end,
    int $precision = 2
): float {
    /** @var DistanceCalculatorInterface $calculator */
    static $calculator;

    if (!$calculator instanceof DistanceCalculatorInterface) {
        $calculator = new MetricDistanceCalculator(new Earth());
    }

    return round(
        $calculator->calculate($start, $end)->getLength(),
        $precision
    );
}
