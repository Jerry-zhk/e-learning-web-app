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
Route::get('activate', 'Auth\RegisterController@activate')->name('account.activate');

Route::get('/', 'PublicController@index')->name('home');
Route::get('search', 'PublicController@search')->name('search');
Route::get('series/{series4public}', 'PublicController@series')->name('series.public');
Route::get('tutorial/{tutorialSlug}', 'PublicController@tutorial')->name('tutorial.public');
Route::post('series/{series4public}/purchase', 'PublicController@seriesPurchase')->name('series.purchase');
Route::post('upload', 'FileUploadController@upload');


Route::prefix('profile')->group(function(){
	Route::get('/', 'ProfileController@index')->name('profile.index');
	Route::get('edit', 'ProfileController@edit')->name('profile.edit');
	Route::put('update', 'ProfileController@update')->name('profile.update');
	Route::get('series-purchased', 'ProfileController@series')->name('profile.series');
	Route::get('activities', 'ProfileController@activities')->name('profile.activities');
});

Route::prefix('admin')->middleware(['auth', 'role:superadmin|admin'])->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::resource('user', 'Admin\UserController');

	Route::resource('series', 'Admin\SeriesController');
	Route::put('series/{series}/restore', 'Admin\SeriesController@restore')->name('series.restore');

	Route::resource('series.tutorial', 'Admin\TutorialController');
	Route::put('series/{series}/tutorial/{tutorial}/restore', 'Admin\TutorialController@restore')->name('series.tutorial.restore');
});


Route::get('/email', function(){
	 \Mail::to('jchong0618@gmail.com')->send(new \App\Mail\AccountActivation());
	 echo 'sent!';
});