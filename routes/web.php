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

Route::prefix('admin')->middleware(['auth', 'role:superadmin|admin|tutor'])->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::resource('user', 'Admin\UserController', ['except' => ['create', 'store', 'update', 'destroy']]);
    Route::put('user/{user}/roleUpdate', 'Admin\UserController@roleUpdate')->name('admin.user.role.update');
    Route::put('user/{user}/permissionUpdate', 'Admin\UserController@permissionUpdate')->name('admin.user.permission.update');


	Route::resource('series', 'Admin\SeriesController');
	Route::put('series/{series}/restore', 'Admin\SeriesController@restore')->name('series.restore');

	Route::resource('series.tutorial', 'Admin\TutorialController');
	Route::put('series/{series}/tutorial/{tutorial}/restore', 'Admin\TutorialController@restore')->name('series.tutorial.restore');

	Route::prefix('role')->middleware(['role:superadmin'])->group(function(){
		Route::get('/', 'Admin\RolePermissionController@roleIndex')->name('role.index');
		Route::get('create', 'Admin\RolePermissionController@roleCreate')->name('role.create');
		Route::post('store', 'Admin\RolePermissionController@roleStore')->name('role.store');
		Route::get('{role}', 'Admin\RolePermissionController@roleShow')->name('role.show');
	});
});


Route::get('/env', function(){
	 dd(getenv('APP_DEBUG'));
});

