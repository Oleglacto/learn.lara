<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');

// регистрация
Route::get('/registration', 'Auth\RegisterController@create');
Route::post('/registration', 'Auth\RegisterController@store');

// Вход/выход
Route::get('/login', 'Auth\LoginController@create');
Route::post('/login', 'Auth\LoginController@store');
Route::get('/logout', 'Auth\LoginController@destroy');


// что-то тестовое
Route::get('/second', 'SecondController@index');

// Админка
Route::get('/admin', 'AdministrationController@index');
Route::get('/admin/products', 'AdministrationController@products');

// Тортики
Route::get('/admin/cake', 'CakeController@create')->name('cakeCreate');
Route::post('/admin/cake', 'CakeController@store')->name('cakeSave');
Route::get('/admin/cake/{cake}', 'CakeController@edit')->name('cakeEdit');
Route::put('/admin/cake/{cake}', 'CakeController@update')->name('cakeUpdate');
Route::delete('/admin/cake/{cake}', 'CakeController@destroy')->name('cakeDelete');