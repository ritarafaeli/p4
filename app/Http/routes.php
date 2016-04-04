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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    # Show login form
    Route::get('/login', 'Auth\AuthController@getLogin');
    # Process login form
    Route::post('/login', 'Auth\AuthController@postLogin');
    # Process logout
    Route::get('/logout', 'Auth\AuthController@getLogout');
    # Show registration form
    Route::get('/register', 'Auth\AuthController@getRegister');
    # Process registration form
    Route::post('/register', 'Auth\AuthController@postRegister');

    Route::group(['middleware' => 'auth'], function () {
        # Show single caregiver profile
        Route::get('/profile/{id}', 'CaregiverController@show');
        # Process caregiver profile form
        Route::post('/profile/{id}', 'CaregiverController@update');
        # Show list of caregivers
        Route::get('/caregivers', 'CaregiverController@index');
        # Show list of jobs
        Route::get('/jobs', 'JobController@index');
        # Show single job
        Route::get('/job/{id}', 'JobController@show');
        # Process job form
        Route::post('/job/{id}', 'JobController@update');
    });



    Route::get('/confirm-login-worked', function() {
        # You may access the authenticated user via the Auth facade
        $user = Auth::user();
        if($user) {
            echo 'You are logged in.';
            dump($user->toArray());
        } else {
            echo 'You are not logged in.';
        }
        return;
    });
});
