<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_required_city()
    {
        $city = null;

        $params = "city={$city}";

        $response = $this->get("/api/weathers/?{$params}");

        $response->assertStatus(302);
    }

    public function test_fetch_city()
    {
        $city = 'nagoya';

        $params = "city={$city}";

        $response = $this->get("/api/weathers/?{$params}");

        $response->assertStatus(200);
    }

    public function test_required_latitude_weather_coordinates()
    {
        $latitude = null;
        $longitude = 139.638031;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/weathers/coordinates?{$params}");

        $response->assertStatus(302);
    }

    public function test_required_longitude_weather_coordinates()
    {
        $latitude = 35.443707;
        $longitude = null;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/weathers/coordinates?{$params}");

        $response->assertStatus(302);
    }

    public function test_fetch_weather_coordinates()
    {
        $latitude = 35.443707;
        $longitude = 139.638031;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/weathers/coordinates?{$params}");

        $response->assertStatus(200);
    }
}
