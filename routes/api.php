<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Categories;
use App\Http\Controllers\API\Words;
use App\Http\Controllers\API\Games;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "/categories"], function() {
    Route::get("", "API\\Categories@index");
    Route::get("/{category}", "API\\Categories@show");
    Route::post("", "API\\Categories@store");
    Route::get("/{category}/words", "API\\Categories\\Words@show");
    Route::post("/{category}/words", "API\\Categories\\Words@store");
});

Route::group(["prefix" => "/games"], function() {
    Route::get("", "API\\Games@index");
    Route::get("/{game}", "API\\Games@show");
    Route::post("", "API\\Games@store");
    Route::delete("/{game}", "API\\Games@destroy");
    Route::patch("/{game}/score", "API\\Games@score");
    Route::patch("/{game}/complete", "API\\Games@complete");
});
