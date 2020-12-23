<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

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
// Route::get('/hello/{id}','App\Http\Controllers\HelloController@index')->where('id', '[0-9]+');
// Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');

// Route::middleware([HelloMiddleware::class])->group(function () {
//     Route::get('/hello', 'App\Http\Controllers\HelloController@index');
//     Route::get('/hello/other', 'App\Http\Controllers\ZHelloController@other');
// });

// 上一個決めれば下が全部書くのが楽になる
Route::namespace('App\Http\Controllers\Sample')->group(function() {
    Route::get('/sample', 'SampleController@index');
    Route::get('/sample/other', 'SampleController@other');
});

// Route::get('/hello', 'App\Http\Controllers\HelloController@index');

// Route::get('/hello', 'HelloController@index');
// Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');


Route::get('/sample', 'App\Http\Controllers\Sample\SampleController@index')->name('sample');
Route::post('/hello/other', 'App\Http\Controllers\HelloController@other');

// Route::get('/hello', 'App\Http\Controllers\HelloController@index')->name('hello');

// Route::get('/hello', 'App\Http\Controllers\HelloController@index');
Route::get('/hello', 'App\Http\Controllers\HelloController@index');

Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');
// Route::get('/hello', 'App\Http\Controllers\HelloController@index')->name('hello');

Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index');


Route::get('/hello', 'App\Http\Controllers\HelloController@index')
    ->middleware(App\Http\Middleware\MyMiddleware::class);


Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index')
    ->middleware(App\Http\Middleware\MyMiddleware::class);
