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

//Endpoint 5
Route::get('/popularity-statistics', 'App\Http\Controllers\MovieInfoController@show1');

// Endpoint 4
Route::get('/movies/rank-by-popularity', 'App\Http\Controllers\MovieInfoController@index1');

// Endpoint 3
Route::get('/movies', 'App\Http\Controllers\MovieInfoController@index');

// Endpoint 2
Route::get('/movies/{slug_or_URL}', 'App\Http\Controllers\MovieInfoController@show');

// Endpoint 1
Route::get('/actors', 'App\Http\Controllers\MovieInfoController@index2');







