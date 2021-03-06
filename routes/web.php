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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('writer.login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer.form');

Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login.post');
Route::post('/login/writer', 'Auth\LoginController@writerLogin')->name('writer.login.post');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin.post');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/writer', 'writer');


Route::get('/home', 'HomeController@index')->name('home');
