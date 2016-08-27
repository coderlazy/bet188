<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    //
});
define('ALL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/getIncidentFeedPrioritised');
define('DETAIL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=1642197&culture=vi-VN&cb=1471711980881');
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::any('home', 'HomeController@index');
    Route::any('/', 'HomeController@index');
    Route::any('data/{id}', ['as' => 'id', 'uses' => 'HomeController@anyData']);
});
