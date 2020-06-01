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

Route::get('/', 'pasarController@show')->middleware('auth');

Route::get('/keranjang/{id}', 'pasarController@daftarBelanja')->middleware('auth');

/*               ROUTE AUTH                    */

//Tampil View Login
Route::get('/login', 'authController@login')->name('login');

//Auth Login
Route::post('/postLogin', 'authController@authLogin');

//Logout
Route::get('/logout', 'authController@logout');

/* 
