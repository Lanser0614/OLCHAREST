<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ComputerForProgram', 'as' => 'ComputerForProgram-v1'], function () {
    Route::get('/', 'ComputerForProgramController@index');
    Route::get('/{id?}', 'ComputerForProgramController@show');
    Route::put('/{id?}', 'ComputerForProgramController@update');
    Route::post('/', 'ComputerForProgramController@store');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

