<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * Testando API externa de clima
     *
     */
    public function test_weather_external_api()
    {
        $city = "Salvador";
        $openWeatherUrl = sprintf("http://api.openweathermap.org/data/2.5/weather?q=%s&appid=%s", $city, env('OPEN_WEATHER_APP_KEY'));
        $response = Http::get($openWeatherUrl)->status();
        if ($response == 200) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    
    /**
     * Testando criação e weather no cache
     *
     */
    public function test_create_weather_in_cache()
    {
        $city = "Salvador";
        $message = "Testing";
        $formatedCity = sprintf("weather-in-%s", mb_strtolower($city,'UTF-8'));
        
        if (Cache::has($formatedCity)) {
            return "This weather already exists";
        } else {
            Cache::put($formatedCity, $message, now()->addMinutes(1));
            return $this->assertTrue(true);
        }
    }
}
