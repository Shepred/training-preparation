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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/login', 'Auth\LoginController@login')->name('login');

Route::get('/login/validate', 'Auth\LoginController@validateLogin');

Route::group(['middleware' => ['user']], function () {
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/exam', 'ExamController@index');
});

Route::group(['middleware' => ['mentor']], function () {
	Route::get('/mentor', 'MentorController@index');
});

Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin', 'AdminController@index');
	Route::get('/admin/users', 'AdminController@users');
	Route::post('/admin/users', 'AdminController@updateUsers');
});