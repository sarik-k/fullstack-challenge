<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{

    protected $base_url = 'https://api.open-meteo.com/v1/forecast';

    /**
     * Fetch weather report from latitude and longitude
     */

    public function fetchWeatherReport(string $latitude, string $longitude)
    {
        $response = Http::get($this->base_url, [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'hourly' => ['temperature_2m', 'rain', 'snowfall', 'weathercode', 'visibility'],
        ]);

        if (!$response->ok())
            return false;

        return $response->collect();
    }
}
