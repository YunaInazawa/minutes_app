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

Route::get('/', 'CrudController@index');
Route::get('/show/{id}', 'CrudController@show');

Route::get('/create', 'CrudController@create');
Route::post('/new', 'CrudController@new');

Route::get('/edit/{id}', 'CrudController@edit');
Route::post('/update', 'CrudController@update');

Route::get('/delete/{id}', 'CrudController@delete');