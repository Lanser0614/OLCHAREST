<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'OlchaCategories', 'as' => 'OlchaCategories-v1'], function ($route) {
    Route::get('/', 'OlchaCategoriesController@index');
});

