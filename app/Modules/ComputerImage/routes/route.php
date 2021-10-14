<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'computer_image', 'as' => 'computer_image-v1'], function () {
     Route::get('/', 'ComputerImageController@index');
    // Route::get('/{id?}', 'ComputerForSaleController@show');
    // Route::put('/{id?}', 'ComputerForSaleController@update');
    // Route::post('/', 'ComputerImageController@store');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});

