<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

// Route::get('/hello/{id}/{name}', 'App\Http\Controllers\HelloController@save');



// 上一個決めれば下が全部書くのが楽になる
Route::namespace('App\Http\Controllers\Sample')->group(function() {
    Route::get('/sample', 'SampleController@index');
    Route::get('/sample/other', 'SampleController@other');
});



Route::get('/sample', 'App\Http\Controllers\Sample\SampleController@index')->name('sample');
Route::post('/hello/other', 'App\Http\Controllers\HelloController@other');

// これがよく呼ばれる
Route::get('/hello', 'App\Http\Controllers\HelloController@index');

Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');

// 二つ書けるのか？
Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index');


Route::get('/hello', 'App\Http\Controllers\HelloController@index')
    ->middleware('MyMW')->name("hello");

Route::get('/hello/json', 'App\Http\Controllers\HelloController@json');
Route::get('/hello/json/{id}', 'App\Http\Controllers\HelloController@json');



Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index')
    ->middleware(App\Http\Middleware\MyMiddleware::class);
