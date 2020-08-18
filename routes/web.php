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

Route::group(['middleware' => ['auth']], function () {
  // Dashboard
  Route::get('/dashboard', 'Dashboard\DashboardController@index');

  // Users
  Route::get('/dashboard/users', 'Dashboard\UserController@index')->name('dashboard.users');
  Route::get('/dashboard/users/{id}/edit', 'Dashboard\UserController@edit')->name('dashboard.users.edit');
  Route::put('/dashboard/users/{id}', 'Dashboard\UserController@update')->name('dashboard.users.update');
  Route::delete('/dashboard/users/{id}', 'Dashboard\UserController@destroy')->name('dashboard.users.delete');
});
