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
    public function index($request)
    {
        # Checando se o cache existe
        if (Cache::has('weather')) {
            # Retornando item do cache
            $weather = Cache::get('weather');
            return response($weather, 200);
        } else {
            # Salvando item no cache
            $weather = Cache::put('weather', 'testing', now()->addMinutes(20));
            return response($weather, 200);
        }
    }
}
