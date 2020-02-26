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

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/','DashboardController@index');
    Route::resource('education','EducationController');
    Route::resource('employee','EmployeeController');
    Route::resource('position','PositionController');
    Route::resource('status','StatusController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');