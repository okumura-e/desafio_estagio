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
Route::get('client/{id}', [App\Http\Controllers\UserController::class, 'view_client'])->name('client.view');



Route::group(['middleware' => 'auth'], function () {
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::post('post', ['as' => 'pages.post', 'uses'=>'App\Http\Controllers\PostController@addnew']);
	
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('users', [App\Http\Controllers\UserController::class, 'user_management'])->name('user.management');
	Route::get('adduser', [App\Http\Controllers\UserController::class, 'add_user'])->name('add.user');
	Route::post('addclient',[App\Http\Controllers\UserController::class, 'add_client'])->name('add.client');
	Route::get('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit_user'])->name('edit.user');
	Route::put('updateclient/{id}', [App\Http\Controllers\UserController::class, 'update_user'])->name('update.user');
	Route::delete('/deleteclient/{id}', [App\Http\Controllers\UserController::class, 'delete_client'])->name('delete.client');


	Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		
	
	Route::delete('profile/delete/{id}', ['as' => 'profile.delete', 'uses' => 'App\Http\Controllers\ProfileController@delete']);

});
