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
Auth::routes();

Route::get('/', function () {
    return view('welcomeback');
});

Route::get('/movies', 'App\Http\Controllers\moviecontroller@movielist');
Route::get('/movies/create', 'App\Http\Controllers\moviecontroller@create');
Route::post('/movies', 'App\Http\Controllers\moviecontroller@store')->middleware('auth');
Route::get('/movies/{id}', 'App\Http\Controllers\moviecontroller@showmovie');
Route::post('/movies/comment/{id}', 'App\Http\Controllers\moviecontroller@setreview');
Route::post('/movies/setrate/{id}', 'App\Http\Controllers\moviecontroller@setrate');
Route::post('/watchlist/{mid}', 'App\Http\Controllers\moviecontroller@setwatched');
Route::post('/movies/addremovetofav/{id}', 'App\Http\Controllers\moviecontroller@addremovetofav');
Route::post('/user/changeuser', 'App\Http\Controllers\usercontroller@changeuser');
Route::post('/user/changepass', 'App\Http\Controllers\usercontroller@changepass');
Route::delete('/movies/{id}','App\Http\Controllers\moviecontroller@destroy')->middleware('auth');;
Route::get('/home','HomeController@index')->name('home');
Route::get('/dashboard', function () {return view('/user/home');});
Route::get('/watchlist', 'App\Http\Controllers\moviecontroller@watchlist')->middleware('auth');;




