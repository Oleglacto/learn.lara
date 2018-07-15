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


Route::prefix('admin')->group(function () {

    // Админка
    Route::get('/', 'AdministrationController@index');
    Route::get('/products', 'AdministrationController@products')->name('products');



    Route::name('album.')->group(function () {
        Route::post('/cake/{cake}/album', 'AlbumsController@store')->name('store');
        Route::put('/cake/{cake}/album/{album}', 'AlbumsController@update')->name('update');
        Route::delete('/albums/{album}', 'AlbumsController@destroy')->name('delete');
        Route::get('/cake/{cake}/album/{album}', 'ImagesController@list')->name('show');
    });
    // Картинки
    Route::post('/cake/{cake}/album/{album}', 'ImagesController@store')->name('image.store');

    Route::name('cake.')->group(function () {
        Route::get('/cake', 'CakeController@create')->name('create');
        Route::post('/cake', 'CakeController@store')->name('save');
        Route::get('/cake/{cake}', 'CakeController@edit')->name('edit');
        Route::put('/cake/{cake}', 'CakeController@update')->name('update');
        Route::delete('/cake/{cake}', 'CakeController@destroy')->name('delete');
    });

});





