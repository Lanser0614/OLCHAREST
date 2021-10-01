<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'computerManufactory', 'as' => 'computerManufactory-v1'], function () {
    Route::get('/', 'ComputerMonofakturaController@index');
    Route::get('/{id?}', 'ComputerMonofakturaController@show');
    Route::put('/{id?}', 'ComputerMonofakturaController@update');
    Route::post('/', 'ComputerMonofakturaController@store');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

