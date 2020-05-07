<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () { return view('/auths.login');});
Route::get('/', function () { return view('/auths.login');});
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:Admin']], function () {
//dosen
Route::get('/dosen', 'DosenController@index');
Route::post('/dosen/create', 'DosenController@create');
Route::get('/dosen/{id}/edit', 'DosenController@edit');
Route::post('/dosen/{id}/update', 'DosenController@update');
Route::get('/dosen/{id}/delete', 'DosenController@delete');
Route::get('/dosen/{id}/profile', 'DosenController@profile');
Route::get('/siswa/exportsemuapdf', 'SiswaController@exportsemuapdf');
});




Route::group(['middleware' => ['auth','checkRole:Admin,siswa,Operator']], function () {
Route::get('/dashboard', 'DashboardController@index');
});





Route::group(['middleware' => ['auth','checkRole:Admin,Operator']], function () {
Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/create', 'SiswaController@create');
Route::get('/siswa/{id}/edit', 'SiswaController@edit');
Route::post('/siswa/{id}/update', 'SiswaController@update');
Route::get('/siswa/{id}/delete', 'SiswaController@delete');
Route::get('/siswa/{id}/profile', 'SiswaController@profile');
Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
Route::get('/siswa/{id}/exportpdf', 'SiswaController@exportpdf');

});
