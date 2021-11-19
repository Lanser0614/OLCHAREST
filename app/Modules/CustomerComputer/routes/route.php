<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'CustomerComputer', 'as' => 'CustomerComputer-v1'], function () {
    Route::get('/', 'CustomerComputerController@index');
});

