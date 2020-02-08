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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/showVessels', 'AdminController@show')->name('vessel.show');
Route::get('/form', 'AdminController@index')->name('form.index');
Route::get('/form/{vessel}/edit', 'AdminController@edit')->name('form.edit');
Route::patch('/form/{vessel}', 'AdminController@update')->name('form.update');
Route::post('/form', 'AdminController@store')->name('form.store');
