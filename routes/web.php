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
    Route::put('user/{user}/roleUpdate', 'Admin\UserController@roleUpdate')->name('admin.user.role.update');
    Route::put('user/{user}/permissionUpdate', 'Admin\UserController@permissionUpdate')->name('admin.user.permission.update');


	Route::resource('series', 'Admin\SeriesController');
	Route::put('series/{series}/restore', 'Admin\SeriesController@restore')->name('series.restore');

	Route::resource('series.tutorial', 'Admin\TutorialController');
	Route::put('series/{series}/tutorial/{tutorial}/restore', 'Admin\TutorialController@restore')->name('series.tutorial.restore');
});


Route::get('/collection', function(){
	$tutorials =  \App\Models\Tutorial::get();
    $series = \App\Models\Series::get();
    $c = collect($tutorials);
    $b = collect($series);
    $d = $c->merge($b);

    dd($d);    
});