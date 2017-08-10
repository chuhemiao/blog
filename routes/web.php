<?php

// User Auth
Auth::routes();
Route::post('password/change', 'UserController@changePassword')->middleware('auth');

// Github Auth Route
Route::group(['prefix' => 'auth/github'], function () {
    Route::get('/', 'Auth\AuthController@redirectToProvider');
    Route::get('callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('register', 'Auth\AuthController@create');
    Route::post('register', 'Auth\AuthController@store');
});

// Search
Route::get('search', 'HomeController@search');

// Discussion
Route::resource('discussion', 'DiscussionController', ['except' => 'destroy']);

// User
Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('profile', 'UserController@edit');
        Route::put('profile/{id}', 'UserController@update');
        Route::post('follow/{id}', 'UserController@doFollow');
        Route::get('notification', 'UserController@notifications');
        Route::post('notification', 'UserController@markAsRead');
    });

    Route::group(['prefix' => '{username}'], function () {
        Route::get('/', 'UserController@show');
        Route::get('comments', 'UserController@comments');
        Route::get('following', 'UserController@following');
        Route::get('discussions', 'UserController@discussions');
    });
});

// User Setting
Route::group(['middleware' => 'auth', 'prefix' => 'setting'], function () {
    Route::get('/', 'SettingController@index')->name('setting.index');
    Route::get('binding', 'SettingController@binding')->name('setting.binding');

    Route::get('notification', 'SettingController@notification')->name('setting.notification');
    Route::post('notification', 'SettingController@setNotification');
});

// Link
Route::get('link', 'LinkController@index');
//coinmarket

Route::get('coinmarket', 'CoinmarketController@index');
Route::get('coinmarket/coinmarketcap', 'CoinmarketController@coinmarketcap');
Route::get('coinmarket/btc', 'CoinmarketController@btc');
Route::get('coinmarket/ico', 'CoinmarketController@ico');
Route::get('coinmarket/marketall', 'CoinmarketController@marketall');
//iota
Route::get('iota', 'IotaController@index');
Route::get('iota/everyweek', 'IotaController@everyweek');
Route::get('iota/bitetech', 'IotaController@bitetech');
Route::get('iota/bitebasic', 'IotaController@bitebasic');

// SiteMap
Route::get('generated/sitemap', 'GeneratedController@siteMap');
Route::get('generated/sitemap.xml', 'GeneratedController@siteMap');

// xem
Route::get('xem', 'XemController@index');
// ico
Route::get('ico', 'IcoController@index');



// Category
Route::group(['prefix' => 'category'], function () {
    Route::get('{category}', 'CategoryController@show');
    Route::get('/', 'CategoryController@index');
});

// Tag
Route::group(['prefix' => 'tag'], function () {
    Route::get('/', 'TagController@index');
    Route::get('{tag}', 'TagController@show');
});

/* Dashboard Index */
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
   Route::get('{path?}', 'HomeController@dashboard')->where('path', '[\/\w\.-]*');
});

// Article
Route::get('/', 'ArticleController@index');
Route::get('{slug}.html', 'ArticleController@show');
Route::get('{slug}', 'ArticleController@show');
