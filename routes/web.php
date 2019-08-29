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

Route::any('upload','UploadController@index');
Route::any('handleCsvUploads','UploadController@handleCsvUploads');
Route::any('dashboard','DashboardController@dashboard');
Route::any('email','JobController@processQueue');
Route::any('getTemplateList','UploadController@getTemplateList');
Route::any('updateTemplateStatus','UploadController@updateTemplateStatus');
