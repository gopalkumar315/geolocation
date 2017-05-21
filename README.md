# Introduction

Geolocation is the identification or estimation of the real-world geographic location of an object, such as a radar source, mobile phone, or Internet-connected computer terminal.

# Installation

```
composer require hylianshield/geolocation
```

# Functional usage

To use the data models for coordinates and distance calculation in a functional
manner, try the following:

```php
<?php
use function HylianShield\Geolocation\coordinates;
use function HylianShield\Geolocation\distance;

// Returns a distance of approximately 361 kilometers.
var_dump(
    // The distance function uses the metric distance calculator under the hood.
    // It assumes earth as base sphere for calculations.
    distance(
        coordinates(50.0, 5.0),
        coordinates(53.0, 3.0)
    ) / 1000 // Divide by a thousand to get kilometers.
);
```

# Object oriented approach

The following data models exist:

* Latitude, a coordinate
* Longitude, a coordinate
* Position, combined latitude and longitude
* Sphere, the object on which coordinates are plotted when calculating distance
* Distance, contains a length and unit in which the distance length is expressed

```php
<?php
use HylianShield\Geolocation\Distance\MetricDistanceCalculator;
use HylianShield\Geolocation\Position;
use HylianShield\Geolocation\Sphere\CelestialBody\Mars;

$marsDistanceCalculator = new MetricDistanceCalculator(new Mars());

// On Mars, the same coordinates give a distance of only 192 kilometers.
var_dump(
    $marsDistanceCalculator->calculate(
        Position::create(50.0, 5.0),
        Position::create(53.0, 3.0)
    )->getLength() / 1000 // Divide by a thousand to get kilometers.
);
```
