<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale); 
	return Redirect::back();
});

Route::resource('products', 'ProductsController');

Route::resource('categories', 'CategoriesController');
