<?php

define('ALL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/getIncidentFeedPrioritised');
define('DETAIL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=1642197&culture=vi-VN&cb=1471711980881');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::any('home', 'HomeController@index');
    Route::any('/', 'HomeController@index');
    Route::any('crawl-data-inplay', ['uses' => 'HomeController@saveData']);
    Route::any('match-info/{id}', ['as' => 'id', 'uses' => 'HomeController@getMatchInfo']);
    Route::any('all-match-inplay', ['uses' => 'HomeController@getAllMatchInPlay']);
    Route::group(['prefix' => 'dadmyn'], function () {
        Route::any('/', ['uses' => 'AdminController@index']);
        Route::any('create-account', ['uses' => 'AdminController@createAccount']);
        Route::any('manage-account', ['uses' => 'AdminController@manageAccount']);
        Route::any('role', ['uses' => 'HomeController@createRole']);
    });
});
