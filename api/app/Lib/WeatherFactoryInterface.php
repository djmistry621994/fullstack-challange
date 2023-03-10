<?php

namespace App\Lib;

interface WeatherFactoryInterface
{
    public function weatherInfo($lat, $lng);
}
