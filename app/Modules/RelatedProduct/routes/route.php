<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'RelatedProduct', 'as' => 'RelatedProduct-v1'], function () {
    Route::get('/', 'RelatedProductController@index');
    Route::get('/motherBoard', 'RelatedProductController@MotherBoard');
    Route::get('/{id?}', 'RelatedProductController@show');
    Route::put('/{id?}', 'RelatedProductController@update');
    Route::post('/', 'RelatedProductController@store');
   
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});