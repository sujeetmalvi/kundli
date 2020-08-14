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

Route::get('/', 'UsersController@userslocations');
Route::get('/userslocations', 'UsersController@userslocations');
Route::get('/usersbtdistances', 'UsersController@usersbtdistances');
Route::get('/usersinfectedreport', 'UsersController@usersinfectedreport');
