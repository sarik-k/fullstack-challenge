<?php

use App\Jobs\FetchWeatherReport;
use App\Services\WeatherService;
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

Route::get('/users', function () {
    return response()->json([
        'message' => 'Successfully fetched all users',
        'users' => \App\Models\User::with('weather_report')->get(),
    ]);
});
