<?php
require_once __DIR__ . '/vendor/autoload.php';

use function HylianShield\Geolocation\coordinates;
use function HylianShield\Geolocation\distance;

var_dump(
    distance(
        coordinates(50.0, 5.0),
        coordinates(53.0, 3.0)
    ) / 1000
);
