<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TwitterPicsController@index');

/* Dashboard */
Route::group(array('prefix' => 'dashboard'), function() {
  Route::get('/', array('as' => 'dashboard', 'before' => 'auth', 'uses' => 'DashboardController@index'));
  Route::get('/login', array('as' => 'login', 'uses' => 'DashboardController@login'));
  Route::post('/verify', array('as' => 'verify', 'uses' => 'DashboardController@verify'));
  Route::get('/logout', array('as' => 'logout', 'uses' => 'DashboardController@logout'));
  Route::get('/moderate/{id}', array('before' => 'auth', 'uses' => 'DashboardController@moderate'));
});