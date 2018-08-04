<?php

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ProductsController@index')->name('products.index');
Route::get('/shop/{product}', 'ProductsController@show')->name('products.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
