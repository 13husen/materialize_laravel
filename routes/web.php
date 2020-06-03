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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'HomeController@getUsers')->name('get.users');

Route::post('delete', 'HomeController@deleteUsers')->name('get.deleteusers');
Route::post('edit', 'HomeController@editUsers')->name('get.editusers');
Route::post('update', 'HomeController@updateUsers')->name('set.updateusers');

Route::post('action', 'HomeController@action')->name('get.action');
