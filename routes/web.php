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

Route::group(['middleware' => 'auth'], function () {
	Route::get('addnew', [App\Http\Controllers\PageController::class, 'add_new'])->name('add.new');
	Route::post('post', [App\Http\Controllers\PostController::class, 'post_new'])->name('post.new');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/read/{id}', [App\Http\Controllers\PageController::class, 'read_new'])->name('new.read');
	
	Route::get('newedit/{id}', [App\Http\Controllers\PageController::class, 'newedit'])->name('new.edit');
	Route::put('newupdate/{id}', [App\Http\Controllers\PageController::class, 'newupdate'])->name('new.update');
	Route::delete('newdelete/{id}', [App\Http\Controllers\PageController::class, 'newdelete'])->name('new.delete');

	
	Route::get('users', [App\Http\Controllers\UserController::class, 'user_management'])->name('user.management');
	Route::get('addclient', [App\Http\Controllers\UserController::class, 'add_client'])->name('add.client');
	Route::post('postclient',[App\Http\Controllers\UserController::class, 'post_client'])->name('post.client');
	Route::get('client/{id}', [App\Http\Controllers\UserController::class, 'view_client'])->name('client.view');

	Route::get('/editclient/{id}', [App\Http\Controllers\UserController::class, 'edit_client'])->name('edit.client');
	Route::put('updateclient/{id}', [App\Http\Controllers\UserController::class, 'update_client'])->name('update.client');
	Route::delete('/deleteclient/{id}', [App\Http\Controllers\UserController::class, 'delete_client'])->name('delete.client');

	Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::delete('profile/delete/{id}', [App\Http\Controllers\ProfileController::class, 'delete'])->name('profile.delete');
});