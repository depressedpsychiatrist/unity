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

Route::get('/', 'UserController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('company', 'CompanyController');
Route::get('company/{company}/addUsers', 'CompanyController@addUsers')->name('company.addUsers');
Route::post('company/{company}/attachUsers', 'CompanyController@attachUsers')->name('company.attachUsers');
Route::get('company/{company}/detachUser/{user}', 'CompanyController@detachUser')->name('company.detachUser');
