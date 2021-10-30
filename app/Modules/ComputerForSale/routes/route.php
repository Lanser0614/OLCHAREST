<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ComputerForSale', 'as' => 'ComputerForSale-v1'], function () {
    Route::get('/', 'ComputerForSaleController@index');
    Route::get('/{id?}', 'ComputerForSaleController@show');
    Route::post('/{computer_id}/{category_id}', 'ComputerForSaleController@update');
    Route::post('/', 'ComputerForSaleController@store');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

