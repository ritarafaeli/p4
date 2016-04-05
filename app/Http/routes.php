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

        #Routes for caregivers
        Route::get('/jobs', 'JobController@index');# Show list of jobs
        Route::get('/job/{id}', 'JobController@show');# Show job
        Route::get('/profile', 'CaregiverController@edit');# Show caregiver their profile
        Route::post('/profile', 'CaregiverController@update');# Update caregiver profile

        #Routes for parents/guardians
        Route::get('/job/create', function(){ return view('job.create');});# Create new job form
        Route::post('/job/create', 'JobController@create');# Create new job
        Route::get('/job/edit/{id}', 'JobController@edit');# Edit job form
        Route::post('/job/edit/{id}', 'JobController@update');# Update job
        Route::post('/job/delete/{id}', 'JobController@delete');# Delete job
        Route::get('/caregivers', 'CaregiverController@index');# Show list of caregivers
        Route::get('/profile/{id}', 'CaregiverController@show');# Show caregiver profile
    });
});
