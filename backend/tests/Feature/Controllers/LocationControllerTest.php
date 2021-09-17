<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_locations()
    {
        $response = $this->get('/api/locations');

        $response->assertStatus(200);
    }

    public function test_required_latitude_recommended_places()
    {
        $latitude = null;
        $longitude = 139.638031;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/locations/recommended-places?{$params}");

        $response->assertStatus(302);
    }

    public function test_required_longitude_recommended_places()
    {
        $latitude = 35.443707;
        $longitude = null;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/locations/recommended-places?{$params}");

        $response->assertStatus(302);
    }

    public function test_fetch_recommended_places()
    {
        $latitude = 35.443707;
        $longitude = 139.638031;

        $params = "latitude={$latitude}&longitude={$longitude}";

        $response = $this->get("/api/locations/recommended-places?{$params}");

        $response->assertStatus(200);
    }
}
