<?php

namespace App\Lib;

use Illuminate\Support\Facades\Http;

class OpenWeatherMapWeather implements WeatherFactoryInterface
{
    public function url($lat, $lng)
    {
        $key = config('site.key');
        return "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&appid=$key";
    }

    public function weatherInfo($lat, $lng)
    {
        $response = $this->weatherData($lat, $lng);

        $weather = $weather_description = null;

        if (isset($response['weather']) && isset($response['weather'][0])) {
            if (isset($response['weather'][0]['main'])) {
                $weather = $response['weather'][0]['main'];
            }
            if (isset($response['weather'][0]['description'])) {
                $weather_description = $response['weather'][0]['description'];
            }
        }

        return [$weather, $weather_description, json_encode($response)];
    }

    public function weatherData($lat, $lng)
    {
        $url = $this->url($lat, $lng);
        $response = Http::get($url);
        return $response->json();
    }


}
