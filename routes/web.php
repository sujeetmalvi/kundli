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

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

Route::get('', 'UsersController@login');
Route::post('/process_login', 'UsersController@process_login');

Route::get('login', [ 'as' => 'login', 'uses' => 'UsersController@login']);

Route::group(['middleware' => 'auth'], function() {
    // Dashboard
	Route::get('/dashboard', 'DashboardController@home');

    // Users
	Route::get('/users', 'UsersController@users');
	Route::post('/create_user', 'UsersController@create_user');

    // Company / City
	Route::get('/company', 'CompanyController@company');
	Route::post('/create_company', 'CompanyController@create_company');
	
	// Doctor
	Route::get('/profile', 'DoctorController@profile');
	
	// Patient
	Route::get('/patient_list/{type?}', 'PatientController@patient_list');
	Route::get('/new_patient', 'PatientController@new_patient');
	Route::post('/save_patient','PatientController@save_patient');
	Route::get('/delete_patient/{id}', 'PatientController@delete_patient');
	Route::get('/view_patient/{id}', 'PatientController@view_patient');
	
	
	// QUESTIONAIR
	Route::post('/questionair','QuestionairController@questionair');
	
	// QUESTION ANSWERS
	Route::get('/questionans_list','QuestionairController@questionans_list');
	Route::get('/new_questionans','QuestionairController@new_questionans');
	Route::post('/save_questionans','QuestionairController@save_questionans');
	
	

	// REPORTS 
	Route::get('/pdf_prescription/{id}', 'PatientController@pdf_prescription');
	
// 	Route::get('/rpt_active_cases', 'ReportsController@rpt_active_cases');
// 	Route::get('/rpt_1stdegree_endangered/{userid}', 'ReportsController@rpt_1stdegree_endangered');
// 	Route::get('/rpt_2nddegree_endangered/{userid}', 'ReportsController@rpt_2nddegree_endangered');
// 	Route::get('/rpt_defaulters', 'ReportsController@rpt_defaulters');
// 	Route::get('/rpt_breaches', 'ReportsController@rpt_breaches');	
// 	Route::get('/rpt_usershealth', 'ReportsController@rpt_usershealth');
// 	Route::get('/rpt_usersbtdistances', 'ReportsController@rpt_usersbtdistances');
	
	
});





