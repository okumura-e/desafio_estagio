<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/typography/{id}', [App\Http\Controllers\PageController::class, 'typography'])->name('typography.show');
Route::get('newedit/{id}', [App\Http\Controllers\PageController::class, 'newedit'])->name('new.edit');



Route::put('newupdate/{id}', [App\Http\Controllers\PageController::class, 'newupdate'])->name('new.update');
Route::delete('newdelete/{id}', [App\Http\Controllers\PageController::class, 'newdelete'])->name('new.delete');



Route::group(['middleware' => 'auth'], function () {
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
		
	Route::post('post', ['as' => 'pages.post', 'uses'=>'App\Http\Controllers\PostController@addnew']);

});
	
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		
	
	Route::delete('profile/delete/{id}', ['as' => 'profile.delete', 'uses' => 'App\Http\Controllers\ProfileController@delete']);

});
