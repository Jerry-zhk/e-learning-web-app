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
Route::get('series/{series4public}', 'PublicController@series')->name('series.public');
Route::get('tutorial/{tutorialSlug}', 'PublicController@tutorial')->name('tutorial.public');
Route::post('upload', 'FileUploadController@upload');

Route::prefix('admin')->middleware(['auth', 'role:superadmin|admin'])->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::resource('user', 'Admin\UserController');

	Route::resource('series', 'Admin\SeriesController');
	Route::put('series/{series}/restore', 'Admin\SeriesController@restore')->name('series.restore');

	Route::resource('series.tutorial', 'Admin\TutorialController');
	Route::put('series/{series}/tutorial/{tutorial}/restore', 'Admin\TutorialController@restore')->name('series.tutorial.restore');
});
