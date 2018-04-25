<?php

Auth::routes();

Route::get('/', 'TestController@index')->name('home');
Route::get('/home', 'TestController@index')->name('home');



Route::get('/registration', 'Auth\RegistrationController@create');
Route::post('/registration', 'Auth\RegistrationController@store');


Route::get('/login', 'Auth\SessionsController@create');
Route::post('/login', 'Auth\SessionsController@store');

Route::get('/logout', 'Auth\SessionsController@destroy');

Route::get('/second', 'SecondController@index');


