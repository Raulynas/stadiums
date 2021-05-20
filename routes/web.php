<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'App\Http\Controllers\StadiumController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stadiums', 'App\Http\Controllers\StadiumController@index')->name('stadiums.index');
Route::get('/stadiums/{city}', 'App\Http\Controllers\StadiumController@show')->name('stadiums.show');

Route::group(["middleware" => ["auth"]], function () {

    Route::get('/stadiums/viewAll', 'App\Http\Controllers\StadiumController@viewAll')->name('stadiums.viewAll');
    Route::get('/stadiums/edit/{stadium}', 'App\Http\Controllers\StadiumController@edit')->name('stadiums.edit');
    Route::post('/stadiums/edit/{stadium}', 'App\Http\Controllers\StadiumController@update');
    Route::get('/stadiums/create', 'App\Http\Controllers\StadiumController@create')->name('stadiums.create');
    Route::post('/stadiums/create', 'App\Http\Controllers\StadiumController@store');
    Route::delete('/stadiums/destroy/{id}', 'App\Http\Controllers\StadiumController@destroy')->name("stadiums.destroy");
});
