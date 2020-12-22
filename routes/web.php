<?php

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('player/create', 'Admin\PlayerController@add');
    Route::post('player/create', 'Admin\PlayerController@create');
    Route::get('player/edit', 'Admin\PlayerController@edit');
    Route::post('player/edit', 'Admin\PlayerController@update');
    Route::get('player/delete', 'Admin\PlayerController@delete');
    
    Route::get('request/create', 'Admin\RequestController@add');
    Route::post('request/create', 'Admin\RequestController@create');
    Route::get('request/edit', 'Admin\RequestController@edit');
    Route::post('request/edit', 'Admin\RequestController@update');
    Route::get('request/delate', 'Admin\RequestController@delete');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/player', 'PlayerController@index');

Route::get('/request', 'RequestController@index');
