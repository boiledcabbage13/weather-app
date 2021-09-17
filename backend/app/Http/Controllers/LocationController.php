<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Location\{
    GetRecommendedPlacesRequest
};

use App\Services\Location\{
    GetLocationRecommendedPlaces,
};

use App\Http\Resources\RecommendedPlace as RecommendedPlaceResource;

class LocationController extends Controller
{
    public function index() {
        return response()->json([
            'data' => config('weather.countries.japan.locations'),
            'message' => 'Successfully get locations.'
        ]);
    }

    public function getRecommendedPlaces(GetRecommendedPlacesRequest $request, GetLocationRecommendedPlaces $action) {
        try {
            $data = $action->execute($request->latitude, $request->longitude);

            return response()->json([
                'data' => new RecommendedPlaceResource($data),
                'message' => 'Successfully get recommended places.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
