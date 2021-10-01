<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ProductForComputer', 'as' => 'ProductForComputer-v1'], function () {
    Route::get('/', 'ProductForComputerController@index');
    Route::get('/{id?}', 'ProductForComputerController@show');
    Route::get('/category/{id?}', 'ProductForComputerController@cat');
    Route::put('/{id?}', 'ProductForComputerController@update');
    Route::post('/', 'ProductForComputerController@store');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

