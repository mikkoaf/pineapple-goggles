<?php

// basic route to get pineapples
Route::get('/ananas', 'AnanasController@show');

// TODO: use passport for use authentication instead
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@create');


// Authenticated routes
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'UserController@details');
    Route::post('details', 'UserController@details');

    // Uploading tasks
    Route::post('/upload', 'Api\UploadController@upload');

    // Accessing locations
    Route::prefix('locations')->group(function () {
        Route::get('/', 'Api\LocationHistoryController@index');
    });

    // Accessing texts
    Route::prefix('texts')->group(function() {
        Route::get('/', 'Api\TextMessageController@index');
    });

    // Accessing link between texts and locations
    Route::prefix('text-locations')->group(function () {
        Route::get('/', 'Api\TextLocationController@index');
    });

    Route::prefix('person')->group( function() {
       Route::resource('/', 'Api\DialoguePersonController');
    });
});

