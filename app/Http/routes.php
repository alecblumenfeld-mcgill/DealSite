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
Route::get('/thanks', function () {
    // if (session('data')['flag'] != "true") {
    //     return redirect('/');
    // }
	
    return view('thanks');
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