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

Route::resource('/user', 'UsersController');
Route::resource('/tests', 'TestsController');
Route::resource('/procedures', 'ProceduresController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/patients', 'UsersController@list_patients')->name('user.patients');
Route::get('/employees', 'UsersController@list_employees')->name('user.employees');
