<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'askCall', 'as' => 'askCall-v1'], function () {
    Route::get('/', 'AskCallController@index');
    Route::post('/', 'AskCallController@store');
    Route::get('/{id?}', 'AskCallController@show');
//    Route::put('/{id?}', 'BookController@update');
//    Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});
