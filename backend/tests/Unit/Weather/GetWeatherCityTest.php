<?php

namespace Tests\Unit\Weather;

use Tests\TestCase;

use App\Services\Weather\{
    GetWeatherCity
};

use Exception;

class GetWeatherCityTest extends TestCase
{
    public function test_error_no_city_params()
    {
        $message = null;

        try {
            $data = (new GetWeatherCity())->execute(null);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        $this->assertEquals('City is required.', $message);
    }

    public function test_city_found()
    {
        $data = (new GetWeatherCity())->execute('nagoya');

        $this->assertEquals(200, $data->cod);
    }
}
