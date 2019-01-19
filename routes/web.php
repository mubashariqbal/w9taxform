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

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', 'FormController@create')->name('form.create');
Route::post('/create', 'FormController@store')->name('form.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
