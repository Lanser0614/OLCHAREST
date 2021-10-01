<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'email_feedback', 'as' => 'email_feedback-v1'], function ($route) {
      Route::get('/', 'EmailFeedbackController@index');
      Route::get('/{id}', 'EmailFeedbackController@show');
      Route::post('/', 'EmailFeedbackController@store');
//    Route::put('/{id?}', 'EmailFeedbackController@update');
    // Route::get('/getBooksByAuthorId/{id?}', 'BookController@getBooksByAuthorId');
});
