<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'feedbackComputer', 'as' => 'feedbackComputer-v1'], function ($route) {
    Route::get('/', 'FeedbackComputerController@index');
    Route::get('/user/{id}', 'FeedbackComputerController@showByUserId');
    Route::get('/{id}', 'FeedbackComputerController@show');
    Route::put('/{id?}', 'FeedbackComputerController@update');
    Route::post('/', 'FeedbackComputerController@store');
});

