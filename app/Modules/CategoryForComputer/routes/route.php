<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'CategoryForComputer', 'as' => 'CategoryForComputer-v1'], function () {
    Route::get('/', 'CategoryForComputerController@index');
    Route::post('/', 'CategoryForComputerController@store');
    Route::get('/{id?}', 'CategoryForComputerController@show');
    Route::put('/{id?}', 'CategoryForComputerController@update');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

