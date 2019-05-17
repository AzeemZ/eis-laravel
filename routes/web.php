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

Route::group(['LoginAndLogout'], function (){
    Route::get('/', 'LoginController@showLoginForm')->name('login');
    Route::post('/', 'LoginController@login');
    Route::get('/logout-employee', 'LoginController@employeeLogout');
    Route::get('/logout-admin', 'LoginController@adminLogout');
});

Route::group(['prefix' => 'employee'], function (){
    Route::get('/home', 'EmployeeController@home')->name('home');
});

Route::group(['prefix' => 'admin'], function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/create-employee', 'AdminController@create');
    Route::post('/create-employee', 'AdminController@store');
    Route::post('/fetch-employee/{id}', 'AdminController@fetchEmployee');
    Route::get('/update-employee', 'AdminController@edit');
    Route::patch('/update-employee', 'AdminController@update');
    Route::get('/delete-employee', 'AdminController@delete');
    Route::delete('/delete-employee', 'AdminController@destroyEmployee');
});
