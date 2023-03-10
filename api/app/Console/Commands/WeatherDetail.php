<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Lib\Weather;
use Illuminate\Console\Command;

class WeatherDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:weathers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting users weathers';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $before_1_hour = strtotime('-1 hour');
        $current_timestamp = date(config('date.timestamp'), $before_1_hour);
        User::where(function ($query) use ($current_timestamp) {
            $query->where('weather_timestamp', '<', $current_timestamp)->orWhereNull('weather_timestamp');
        })->chunk(200, function ($users) {
            foreach ($users as $user) {
                $lat = $user->latitude;
                $lng = $user->longitude;

                $weather = new Weather();
                [$weather, $weather_description, $weather_object] = $weather->getWeatherInfo($lat, $lng);

                $user->update([
                    'weather'             => $weather,
                    'weather_description' => $weather_description,
                    'weather_object'      => $weather_object,
                    'weather_timestamp'   => date(config('date.timestamp')),
                ]);
            }
        });
    }
}
