<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'computers', 'as' => 'computers-v1'], function ($route) {
    // Route::get('/{id}', 'ComputerController@show');
    Route::get('/', 'ComputerController@index');
    Route::put('/{id?}', 'ComputerController@update');
    Route::post('/', 'ComputerController@store');
    Route::get('/{slug}', 'ComputerController@slug');
    Route::get('/getComputerByProgramId/{program_id?}', 'ComputerController@getByProgramId');
});
