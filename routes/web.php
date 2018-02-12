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

Route::get('/', function () {
    return view('landing');
});

Route::get('/upload', 'FrontController@index');

Route::post('/contact', 'FrontController@contact');

Route::post('/api/gif', 'ApiController@gif');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
