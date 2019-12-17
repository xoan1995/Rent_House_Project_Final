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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/edit-profile', 'UserController@editUser')->name('editUser');
Route::post('/update-profile', 'UserController@update')->name('users.update');
Route::get('/change-password', 'UserController@viewChangePassword')->name('user.changePassword');
Route::post('/change-password', 'UserController@changePassword')->name('user.changePassword');

Route::prefix('houses')->group(function () {
    Route::get('/create', 'HouseController@create')->name('createHouse');
    Route::post('/store', 'HouseController@store')->name('storeHouse');
    Route::get('image', 'HouseController@createImage')->name('createImage');
    Route::post('store/image', 'HouseController@storeImage')->name('storeImage');
    Route::get('totalHouse/{id}', 'HouseController@totalHouse')->name('totalHouse');
    Route::get('search', 'HouseController@search')->name('search');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
