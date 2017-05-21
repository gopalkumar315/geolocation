<?php
require_once __DIR__ . '/vendor/autoload.php';

use function HylianShield\Geolocation\coordinates;
use function HylianShield\Geolocation\distance;
use HylianShield\Geolocation\Distance\MetricDistanceCalculator;
use HylianShield\Geolocation\Position;
use HylianShield\Geolocation\Sphere\CelestialBody\Mars;

// Returns a distance of approximately 361 kilometers.
var_dump(
    // The distance function uses the metric distance calculator under the hood.
    // It assumes earth as base sphere for calculations.
    distance(
        coordinates(50.0, 5.0),
        coordinates(53.0, 3.0)
    ) / 1000 // Divide by a thousand to get kilometers.
);

$marsDistanceCalculator = new MetricDistanceCalculator(new Mars());

// On Mars, the same coordinates give a distance of only 192 kilometers.
var_dump(
    $marsDistanceCalculator->calculate(
        Position::create(50.0, 5.0),
        Position::create(53.0, 3.0)
    )->getLength() / 1000 // Divide by a thousand to get kilometers.
);
