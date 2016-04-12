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

    Route::get('/', function () { return view('welcome'); });

    Route::get('/login', 'Auth\AuthController@getLogin');# Show login form
    Route::post('/login', 'Auth\AuthController@postLogin');# Process login form
    Route::get('/logout', 'Auth\AuthController@getLogout');# Process logout
    Route::get('/register', 'Auth\AuthController@getRegister');# Show registration form
    Route::post('/register', 'Auth\AuthController@postRegister');# Process registration form

    Route::group(['middleware' => 'auth'], function () {
        #Routes for all users
        Route::get('/account', function(){ return view('account');});# Show account information
        Route::post('/account', 'AccountController@updateAccount');# Update account information
        Route::get('/favorite/{id}', 'StarController@toggle');# Update account information

        #Routes for caregivers
        Route::get('/jobs', 'JobController@index');# Show list of jobs
        Route::get('/job/{id}', 'JobController@show');# Show job
        Route::get('/profile', 'CaregiverController@edit');# Show caregiver their profile
        Route::post('/profile', 'CaregiverController@update');# Update caregiver profile

        #Routes for parents/guardians
        Route::get('/newjob', 'JobController@getCreateJobForm');# View create new job form
        Route::post('/job/create', 'JobController@create');# Create new job
        Route::get('/job/edit/{id}', 'JobController@edit');# Edit job form
        Route::post('/job/edit/{id}', 'JobController@update');# Update job
        Route::get('/job/delete/{id}', 'JobController@destroy');# Delete job
        Route::get('/jobs/all', 'JobController@getMyJobs');# Show guardian's list of jobs
        Route::get('/caregivers', 'CaregiverController@index');# Show list of caregivers
        Route::get('/caregiver/{id}', 'CaregiverController@show');# Show caregiver profile
    });
});
