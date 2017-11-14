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

Auth::routes();

Route::get('/', 'PublicController@index')->name('home');
Route::get('search', 'PublicController@search')->name('search');

Route::prefix('admin')->middleware(['auth', 'role:superadmin|admin'])->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::resource('user', 'Admin\UserController');
	Route::resource('series', 'Admin\SeriesController');
	Route::resource('series.tutorial', 'Admin\TutorialController');
});

Route::post('upload', 'FileUploadController@upload');