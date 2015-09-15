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

Route::get('/', function () {
    return view('home');
});



Route::get('/register', function () {
    return view('manage.register');
});

Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/login', function () {
    return view('manage.login');
});


Route::group(['prefix' => 'manage'], function () {
 
    Route::post('/register', 'ProfileController@registerUser');

    Route::get('/logout', 'ProfileController@logout');

    Route::get('/login', function () {return view('manage.login');});

    Route::post('/login', 'ProfileController@login');

    Route::get('/', 'ManageController@showUnused');

    Route::get('/used', 'ManageController@showUsed');

    Route::post('/search', 'ManageController@search');

    Route::post('/check', 'ManageController@check');

    Route::post('/uncheck', 'ManageController@uncheck');

});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
 
    Route::get('/', 'ProfileController@getUser');
 
    Route::post('edit', 'ProfileController@postEdit');
 
    Route::get('invoice/{invoice}', 'ProfileController@getPrintInvoice');
 
    Route::get('cancel', 'ProfileController@getCancel');
});
Route::group(['prefix' => 'sponsor'], function() {
 
    Route::get('/', 'SubscribeController@getSponsorPage');
 
    Route::post('1show', 'SubscribeController@post1Show');
 
    Route::post('2show', 'SubscribeController@post2Show');
 
    Route::post('fan', 'SubscribeController@postFan');
});