<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Programs', 'as' => 'Programs-v1'], function () {
    Route::get('/', 'ProgramController@index');
    Route::get('/{id?}', 'ProgramController@getProgramBytId');
    Route::put('/{id?}', 'ProgramController@update');
    Route::post('/', 'ProgramController@store');
    Route::get('/show/{id?}', 'ProgramController@show');
});

