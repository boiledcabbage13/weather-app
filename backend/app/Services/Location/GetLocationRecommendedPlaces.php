<?php

namespace App\Services\Location;

use Illuminate\Support\Facades\Http;
use Exception;

class GetLocationRecommendedPlaces {
    public function execute($latitude, $longitude) {
        try {
            if(!$latitude) {
                throw new Exception('Latitude is required.');
            }

            if(!$longitude) {
                throw new Exception('Longitude is required.');
            }

            $url = config('services.weather.foursquare.expore_url');

            $response = Http::get($url, [
                'll' => "{$latitude},{$longitude}",
                'client_id' => config('services.weather.foursquare.key'),
                'client_secret' => config('services.weather.foursquare.secret'),
                'v' => date('Ymd')
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