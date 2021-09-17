<?php

namespace App\Services\Weather;

use Illuminate\Support\Facades\Http;
use Exception;

class GetWeatherCoordinates {
    public function execute($latitude, $longitude) {
        try {
            if(!$latitude) {
                throw new Exception('Latitude is required.');
            }

            if(!$longitude) {
                throw new Exception('Longitude is required.');
            }

            $url = config('services.weather.open_weather_map.one_call_url');

            $response = Http::get($url, [
                'lat' => $latitude,
                'lon' => $longitude,
                'exclude' => 'minutely,hourly',
                'appid' => config('services.weather.open_weather_map.key')
            ]);

            if ($response->failed()) {
                throw new Exception('Something went wrong.');
            }

            return json_decode($response->body());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}