<?php

Route::get('/', 'TestController@index')->name('home');



Route::get('/registration', 'RegistrationController@create');
Route::post('/registration', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
