<?php

namespace App\Lib;

class WeatherFactory
{

    public function make(): WeatherFactoryInterface
    {
        if (config('site.weather_type') == 'openweathermap') {
            return new OpenWeatherMapWeather();
        }
    }
}
