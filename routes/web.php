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
Route::get('link/about', 'LinkController@about');
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
Route::get('iota/wallet', 'IotaController@wallet');
Route::get('iota/ore', 'IotaController@ore');

Route::get('iota/pushbai', function()
{
    $urls = array(
        'https://www.btxiaobai.com/cong-hunt-well.html',
        'https://www.btxiaobai.com/2100no-more-num.html',
    );

    $api = 'http://data.zz.baidu.com/urls?site=https://www.btxiaobai.com/&token=veiJlvUY2TjvVdHc&type=realtime';
    $ch = curl_init();
    $options =  array(
        CURLOPT_URL => $api,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => implode("\n", $urls),
        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    echo $result;

});

// SiteMap

Route::get('sitemap.xml', function()
{
    // create sitemap
    $sitemap_posts = App::make("sitemap");

    // set cache
    $sitemap_posts->setCache('laravel.sitemap-posts', 3600);

    // add items
    $posts = DB::table('articles')->orderBy('created_at', 'desc')->get();

    foreach ($posts as $post)
    {
        $post->slug = 'https://www.btxiaobai.com/'.$post->slug.'.html';
        $sitemap_posts->add($post->slug, $post->updated_at,'1','weekly');
    }
    // show sitemap
    return $sitemap_posts->render('xml');
});
// xem
Route::get('xem', 'XemController@index');
// ico
Route::get('ico', 'IcoController@index');
// medium
Route::get('callback/medium', 'CallbackController@medium');

//truncate
Route::get('truncate', 'TruncateController@index');

// rss

Route::get('rss.xml', function () {

   /* create new feed */
   $feed = App::make("feed");

   /* creating rss feed with our most recent 20 posts */
   $posts = \DB::table('articles')->orderBy('created_at', 'desc')->take(20)->get();

   /* set your feed's title, description, link, pubdate and language */
   $feed->title = "比特币小白";
   $feed->description = '比特币小白，专注对数字币新闻与ICO消息传播，让更多的人了解到区块链、认识数字币。';
   $feed->logo = 'https://cdn.btxiaobai.com/article/2017/08/24/ndC7F7C1UzydCztXPlzWOBEXJJ0jRtwJmTWoRPF6.png';
   $feed->link = url('feed');
   $feed->setDateFormat('datetime');
   $feed->pubdate = $posts[0]->created_at;
   $feed->lang = 'en';
   $feed->setShortening(true);
   $feed->setTextLimit(100);

   foreach ($posts as $post)
   {
       $feed->add($post->title, 'chuhemiao', URL::to($post->slug), $post->created_at, $post->meta_description, $post->meta_description);
   }

   return $feed->render('atom');

});


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
