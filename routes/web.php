<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', 'App\Http\Controllers\TodoController@index');
Route::post('/todo/create', 'App\Http\Controllers\TodoController@create');
Route::post('/todo/update', 'App\Http\Controllers\TodoController@update');
Route::post('/todo/delete', 'App\Http\Controllers\TodoController@delete');
/* Route::post('/todo/create', 'App\Http\Controllers\TodoController@post'); */
/*  */
