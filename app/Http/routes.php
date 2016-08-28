<?php

define('ALL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/getIncidentFeedPrioritised');
define('DETAIL_MATCH', 'https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=1642197&culture=vi-VN&cb=1471711980881');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::any('home', 'HomeController@index');
    Route::any('/', 'HomeController@index');
    Route::any('data/{id}', ['as' => 'id', 'uses' => 'HomeController@anyData']);
    Route::any('dadmyn', ['uses' => 'AdminController@index']);
    Route::any('dadmyn/create-account', ['uses' => 'AdminController@createAccount']);
    Route::any('dadmyn/manage-account', ['uses' => 'AdminController@manageAccount']);
    Route::any('dadmyn/role', ['uses' => 'HomeController@createRole']);
});

