<?php

namespace HylianShield\Geolocation\Distance;

use HylianShield\Geolocation\PositionInterface;
use HylianShield\Geolocation\Sphere\CelestialBody\Earth;
use HylianShield\Geolocation\Sphere\SphereInterface;

/**
 * @see https://en.wikipedia.org/wiki/Haversine_formula
 */
class MetricDistanceCalculator implements DistanceCalculatorInterface
{
    /** @var SphereInterface */
    private $sphere;

    /**
     * Constructor.
     *
     * @param SphereInterface $sphere
     */
    public function __construct(SphereInterface $sphere)
    {
        $this->sphere = $sphere;
    }

    /**
     * Create a metric distance calculator, using earth as base sphere.
     *
     * @return MetricDistanceCalculator
     */
    public static function create(): MetricDistanceCalculator
    {
        return new static(new Earth());
    }

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
    ): DistanceInterface {
        $deltaLatitude  = deg2rad(
            $start->getLatitude()->getAngle()
            - $end->getLatitude()->getAngle()
        );
        $deltaLongitude = deg2rad(
            $start->getLongitude()->getAngle()
            - $end->getLongitude()->getAngle()
        );

        $angle = asin(
            sqrt(
                pow(
                    sin($deltaLatitude * 0.5),
                    2
                )
                + cos(deg2rad($start->getLatitude()->getAngle()))
                * cos(deg2rad($end->getLatitude()->getAngle()))
                * pow(
                    sin($deltaLongitude * 0.5),
                    2
                )
            )
        ) * 2;

        return new MetricDistance(
            $angle * $this->sphere->getRadius()
        );
    }
}
