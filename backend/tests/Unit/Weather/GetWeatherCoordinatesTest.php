<?php

namespace Tests\Unit\Weather;

use Tests\TestCase;

use App\Services\Weather\{
    GetWeatherCoordinates
};

class GetWeatherCoordinatesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_error_no_latitude_params()
    {
        $message = null;
        $latitude = null;
        $longitude = 4534.5235;

        try {
            $data = (new GetWeatherCoordinates())->execute($latitude, $longitude);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        $this->assertEquals('Latitude is required.', $message);
    }

    public function test_error_no_longitude_params()
    {
        $message = null;
        $latitude = 4534.5235;
        $longitude = null;

        try {
            $data = (new GetWeatherCoordinates())->execute($latitude, $longitude);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        $this->assertEquals('Longitude is required.', $message);
    }

    public function test_error_valid_coordinates()
    {
        $message = null;
        $latitude = 4534.5235;
        $longitude = 23523.4124;

        try {
            $data = (new GetWeatherCoordinates())->execute($latitude, $longitude);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        $this->assertEquals('Something went wrong.', $message);
    }

    public function test_valid_coordinates()
    {
        $latitude = 35.443707;
        $longitude = 139.638031;

        $data = (new GetWeatherCoordinates())->execute($latitude, $longitude);

        $this->assertTrue(true);
    }
}