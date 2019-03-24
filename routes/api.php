<?php

use Illuminate\Http\Request;

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

// basic route to get pineapples
Route::get('/ananas', 'AnanasController@show');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('locations')->group(function () {
    Route::get('{person}', 'LocationHistoryController@index');
});

Route::prefix('texts')->group(function() {
    Route::get('{person}', 'TextMessageController@index');
});