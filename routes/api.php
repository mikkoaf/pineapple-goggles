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

Route::prefix('v2')->group(function () {
    // API V2
    Route::prefix('locations')->group(function () {
        Route::get('/{person}', 'LocationHistoryController@index');
    });

    Route::prefix('texts')->group(function() {
        Route::get('/{person}', 'TextMessageController@index');
    });
    Route::get('/hello', function() {
        return 'hi';
    });

});

// Legacy API
Route::prefix('v1')->group(function () {
    // API V1
    Route::prefix('resources')->group(function () {
        Route::prefix('emojis')->group(function() {
            Route::get('/next', 'EmojiController@index');
        });
        Route::prefix('locations')->group(function() {
            Route::get('/', 'LocationsController@index');
            Route::get('/next', 'LocationsController@next');
        });
        Route::prefix('messages')->group(function() {
            Route::get('/', 'MessagesController@index');
        });
    });
});
