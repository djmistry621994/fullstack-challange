<?php

namespace App\Lib;

class Weather
{
    public function getWeatherInfo($lat, $lng)
    {
        return (new WeatherFactory())->make()->weatherInfo($lat, $lng);
    }
}
