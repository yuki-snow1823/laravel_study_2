<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloController;

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

// Route::get('/hello', 'HelloController@index')->name('hello');
Route::get('/hello/{id}','App\Http\Controllers\HelloController@index')->where('id', '[0-9]+');
Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');
