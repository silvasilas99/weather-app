<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherCheck extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $city)
    {
        # Formatando param de cidade
        $formatedCityParam = sprintf("weather-in-%s", mb_strtolower($city,'UTF-8'));
        # Checando se o cache existe
        if (Cache::has($formatedCityParam)) {
            # Pegando e retornando item do cache, se ele existir
            $city = Cache::get($formatedCityParam);
            return response($city, 200);
        } else {
            # Gerando URL com a cidade do params e chave do .env
            $openWeatherUrl = sprintf("http://api.openweathermap.org/data/2.5/weather?q=%s&appid=%s", $city, env('OPEN_WEATHER_APP_KEY'));
            # Realizando request e salvando resposta em formato json
            $response = Http::get($openWeatherUrl)->json();
            # Salvando item no cache
            Cache::put($formatedCityParam, $response, now()->addMinutes(20));
            # Retornando resposta para o cliente
            return response($response, 200);
        }
    }
}
