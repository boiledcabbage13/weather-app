<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Http\Requests\Weather\{
    GetWeatherCityRequest,
    GetWeatherCoordinatesRequest
};

use App\Services\Weather\{
    GetWeatherCity,
    GetWeatherCoordinates
};

use App\Http\Resources\CityCoordinates as CityCoordinatesResource;
use App\Http\Resources\WeatherCoordinates as WeatherCoordinatesResource;

class WeatherController extends Controller
{
    public function getCity(GetWeatherCityRequest $request, GetWeatherCity $action) {
        try {
            $data = $action->execute($request->city);

            return response()->json([
                'data' => new CityCoordinatesResource($data),
                'message' => 'Successfully get weather.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getCoordinates(GetWeatherCoordinatesRequest $request, GetWeatherCoordinates $action) {
        try {
            $data = $action->execute($request->latitude, $request->longitude);

            return response()->json([
                'data' => new WeatherCoordinatesResource($data),
                'message' => 'Successfully get weather.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
