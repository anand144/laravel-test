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

Auth::routes();



Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {

	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::post('/profile-update', 'HomeController@profileUpdate')->name('profile.update');
	Route::post('/password-update', 'HomeController@passwordUpdate')->name('password.update');

	Route::group(['prefix' => 'category'], function () {
		Route::get('/list', 'CategoryController@list')->name('category.list');
		Route::get('/add', 'CategoryController@add')->name('category.add');
		Route::post('/save', 'CategoryController@save')->name('category.save');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
		Route::post('/update', 'CategoryController@update')->name('category.update');
		Route::post('/delete', 'CategoryController@delete')->name('category.delete');
	});

	Route::group(['prefix' => 'product'], function () {
		Route::get('/list', 'ProductController@list')->name('product.list');
		Route::get('/add', 'ProductController@add')->name('product.add');
		Route::post('/save', 'ProductController@save')->name('product.save');
		Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
		Route::post('/update', 'ProductController@update')->name('product.update');
		Route::post('/delete', 'ProductController@delete')->name('product.delete');
	});


});
