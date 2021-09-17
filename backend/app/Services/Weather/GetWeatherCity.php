<?php

namespace App\Services\Weather;

use Illuminate\Support\Facades\Http;
use Exception;

class GetWeatherCity {
    public function execute($city) {
        try {
            if(!$city) {
                throw new Exception('City is required.');
            }

            $url = config('services.weather.open_weather_map.one_location_url');

            $response = Http::get($url, [
                'q' => $city,
                'appid' => config('services.weather.open_weather_map.key')
            ]);

            if ($response->failed()) {
                throw new Exception('City not found.');
            }

            return json_decode($response->body());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}