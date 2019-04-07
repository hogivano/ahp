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

Route::get('/login', 'HomeController@login')->name('login');
Route::post('/login', 'UserController@login')->name('login.submit');

Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'UserController@register')->name('register.submit');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

  Route::group(['prefix' => 'criteria'], function(){
    Route::get('/', 'KriteriaController@index')->name('kriteria.index');
    Route::get('/new', 'KriteriaController@new')->name('kriteria.new');
    Route::post('/new', 'KriteriaController@create')->name('kriteria.create');
    Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::post('/delete', 'KriteriaController@delete')->name('kriteria.delete');
  });

  Route::group(['prefix' => 'alternative'], function(){
    Route::get('/', 'AlternatifController@index')->name('alternatif.index');
    Route::get('/new', 'AlternatifController@new')->name('alternatif.new');
    Route::post('/new', 'AlternatifController@create')->name('alternatif.create');
    Route::get('/edit/{id}', 'AlternatifController@edit')->name('alternatif.edit');
    Route::post('/edit/{id}', 'AlternatifController@update')->name('alternatif.update');
    Route::post('/delete', 'AlternatifController@delete')->name('alternatif.delete');
  });

  Route::group(['prefix' => 'value-criteria'], function(){
    Route::get('/', 'NilaiKriteriaController@index')->name('nilai-kriteria.index');
    Route::get('/new', 'NilaiKriteriaController@new')->name('nilai-kriteria.new');
    Route::post('/new', 'NilaiKriteriaController@create')->name('nilai-kriteria.create');
  });

  Route::group(['prefix' => 'value-alternative'], function(){
    Route::get('/', 'NilaiAlternatifController@index')->name('nilai-alternatif.index');
    Route::get('/new', 'NilaiAlternatifController@new')->name('nilai-alternatif.new');
    Route::post('/new', 'NilaiAlternatifController@create')->name('nilai-alternatif.create');
  });

  Route::get('/normalisasi', 'NormalisasiKriteriaController@index')->name('normalisasi');
  Route::get('/weight-alternative', 'PembobotanAlternatifController@index')->name('bobot-alternatif.index');
  Route::get('/ranking', 'RankingController@index')->name('ranking.index');

  Route::get('process', 'AdminController@process')->name('proses');
  Route::get('logout', 'UserController@logout')->name('logout');
});
