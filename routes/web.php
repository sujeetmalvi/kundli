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
Route::get('/login', 'UsersController@login');
Route::get('/dashboard', 'UsersController@dashboard');
Route::get('/rpt_active_cases', 'ReportsController@rpt_active_cases');
Route::get('/rpt_1stdegree_endangered/{userid}', 'ReportsController@rpt_1stdegree_endangered');
Route::get('/rpt_2nddegree_endangered/{userid}', 'ReportsController@rpt_2nddegree_endangered');
Route::get('/rpt_defaulters', 'ReportsController@rpt_defaulters');


