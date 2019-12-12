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
Route::get('/edit', 'UserController@editUser')->name('editUser');
Route::get('/createHouse', 'UserController@createHouse')->name('createHouse');

Route::prefix('houses')->group(function () {
    Route::get('/create', 'HouseController@create')->name('createHouse');
    Route::post('/store', 'HouseController@store')->name('storeHouse');
    Route::get('image', 'HouseController@createImage')->name('createImage');
    Route::post('store/image', 'HouseController@storeImage')->name('storeImage');
});


Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
