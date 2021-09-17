<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('weathers')->group(function () {
    Route::get('/', 'WeatherController@getCity');
    Route::get('/coordinates', 'WeatherController@getCoordinates');
});

Route::prefix('locations')->group(function () {
    Route::get('/', 'LocationController@index');
    Route::get('/recommended-places', 'LocationController@getRecommendedPlaces');
});