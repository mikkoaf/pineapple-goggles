<?php

// basic route to get pineapples
use Illuminate\Support\Facades\Route;

Route::get('/ananas', 'AnanasController@show');

// TODO: use passport for use authentication instead
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@create');


// Authenticated routes
//Route::group(['middleware' => 'auth:api'], function(){
    Route::prefix('users/{id}')->group( function() {
        Route::get('details', 'UserController@details');
        Route::post('details', 'UserController@details');

        // Accessing locations
        Route::prefix('locations')->group(function () {
            Route::get('/', 'Api\Users\LocationHistoryController@index');
        });

        // Accessing texts

        Route::resource('texts', 'Api\Users\TextMessageController');

        // Accessing link between texts and locations
        Route::resource('text-locations', 'Api\Users\TextLocationController');

        Route::resource('dialogue-people', 'Api\Users\DialoguePersonController');

    });


    // Messages to month...



    // Uploading tasks
    Route::post('/upload', 'Api\UploadController@upload');

    // Accessing locations
    Route::prefix('locations')->group(function () {
        Route::get('/', 'Api\LocationHistoryController@index');
    });

    // Accessing texts

    Route::resource('texts', 'Api\TextMessageController');
    Route::prefix('texts')->group(function() {
        //Route::get('/', 'Api\TextMessageController@index');
        Route::resource('per-month', 'Api\MessagesToMonthController');
    });

    // Accessing link between texts and locations
    Route::prefix('text-locations')->group(function () {
        Route::get('/', 'Api\TextLocationController@index');
    });

    Route::prefix('dialogue-people')->group( function() {
       Route::resource('/', 'Api\DialoguePersonController');

        // Messages to time of day...
        Route::get('{dialoguePerson}/favorite/hours', 'Api\DialoguePersonController@favoriteHours');
    });
//});

