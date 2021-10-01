<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'OlchaProducts', 'as' => 'OlchaProducts-v1'], function ($route) {
    Route::get('/{id}', 'ProductController@show');
    //Route::get('/', 'ProductController@index');
    // Route::get('/', 'BookController@index');
    // Route::get('/{id?}', 'BookController@show');
    // Route::put('/{id?}', 'BookController@update');
    // Route::post('/', 'BookController@store');
    // Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});