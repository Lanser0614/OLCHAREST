<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'computerPeripherals', 'as' => 'computerPeripherals-v1'], function () {
       Route::get('/', 'computerPeripheralsController@index');
       Route::get('/{id?}', 'computerPeripheralsController@show');
    // Route::put('/{id?}', 'ProgramController@update');
    // Route::post('/', 'ProgramController@store');
    // Route::get('/show/{id?}', 'ProgramController@show');
});

