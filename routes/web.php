<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->intended('/weather-api');
});

Route::get('/weather-api/by-date', 'App\Http\Controllers\Weather@index');

Route::get('/get-city-weather', 'App\Http\Controllers\Weather@show');
Route::get('/get-city-weather-date', 'App\Http\Controllers\Weather@getWeatherByDate');


Route::resource('/weather-api', App\Http\Controllers\Weather::class);

