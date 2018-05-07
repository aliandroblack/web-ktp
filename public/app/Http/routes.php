<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// front end
	Route::get('/', function () {
		return view('login/login');
	});

// backend
	Route::group(['middleware' => ['web']], function () {
		Route::controller('auth', 'AuthController');

		Route::group(["middleware" => 'authlogin'], function() {
			Route::controller('dashboard', 'DashboardController');

			// GENERAL
			Route::controller('verifikasi-data-pribadi', 'DataVerificationController');
            Route::controller('news', 'KtpController');
		    Route::controller('verifikasi-data-pribadi', 'DataVerificationController');
			Route::controller('profile', 'ProfileController');


		});


	});
//api
Route::get('apis/news', 'ApiNewsController@index');
Route::get('apis/promotion', 'ApiPromotionController@index');
Route::get('apis/events', 'ApiEventController@index');
Route::get('apis/vacancies', 'ApiJobVacanController@index');
// api