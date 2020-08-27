<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('sendNotification', 'AuthController@sendNotification');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::post('registerbluetooth', 'AuthController@registerbluetooth');
        Route::post('registerpush', 'AuthController@registerpush');
        Route::post('usercheckinout', 'AuthController@usercheckinout');
        Route::post('userslocations', 'AuthController@userslocations');
        Route::post('usersservey', 'AuthController@usersservey');
        Route::post('updatedevicetoken', 'AuthController@updatedevicetoken');
        Route::post('updatebluetoothtoken', 'AuthController@updatebluetoothtoken');
        Route::post('reportasinfected', 'AuthController@reportasinfected');
        Route::post('reporthealth', 'AuthController@reporthealth');
    });

});
