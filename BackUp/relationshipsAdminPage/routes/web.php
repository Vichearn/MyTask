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
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale); 
	return Redirect::back();
});

Auth::routes();

Route::get('products/findPc', 'ProductsController@findPc')->name('findPc');
Route::get('products/findNotebook', 'ProductsController@findNotebook')->name('findNotebook');
Route::get('products/findPhone', 'ProductsController@findPhone')->name('findPhone');
Route::resource('products', 'ProductsController');

Route::resource('categories', 'CategoriesController');

Route::get('/admin', 'AdminController@admin')
    /*->middleware('is_admin')*/
    ->name('admin');
