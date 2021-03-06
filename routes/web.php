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
    $posts = DB::table('articles')->orderBy('created_at', 'desc')->offset(1)->limit(20)->get();

    foreach ($posts as $post)
    {
        $post->slug = 'https://www.btxiaobai.com/'.$post->slug.'.html';

        $sitemap_posts->add($post->slug, $post->updated_at,'1','weekly');
    }
    // show sitemap
    return $sitemap_posts->render('xml');
});



Route::get('addbaidu', function () {


    /* creating rss feed with our most recent 20 posts */
    $posts = \DB::table('articles')->orderBy('created_at', 'desc')->take(10)->get();

    foreach ($posts as $post)
    {
        $urls = array($post->slug);
        $api = 'http://data.zz.baidu.com/urls?appid=1571073467972034&token=G54l9hsFiFIO4f6I&type=realtime';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result= curl_exec($ch);
    }

    return $result;

});

// shell news
Route::get('xem', 'XemController@index');
Route::get('xem/shell', 'XemController@shell');
Route::get('xem/cdapp', 'XemController@cdapp');
Route::get('xem/cdetail', 'XemController@cdetail');
Route::get('xem/cdScroll', 'XemController@cdScroll');
Route::get('xem/cdHour', 'XemController@cdHour');
Route::get('xem/cdarticle', 'XemController@cdarticle');
Route::get('xem/cdCoindesk', 'XemController@cdCoindesk');
Route::get('xem/cNum', 'XemController@cNum');
Route::get('xem/addBsj', 'XemController@addBsj');
Route::get('xem/cdTranslate', 'XemController@cdTranslate');
Route::get('xem/addDailybtc', 'XemController@addDailybtc');
// 期货数据

Route::get('xem/qhData', 'XemController@qhData');
Route::get('xem/qhHourData', 'XemController@qhHourData');
Route::get('xem/getExcelCzce', 'XemController@getExcelCzce');


// 笺信

Route::get('xem/receiveLetter', 'XemController@receiveLetter');
Route::get('xem/sendLetter', 'XemController@sendLetter');
Route::get('xem/getCountLetter', 'XemController@getCountLetter');

Route::get('xem/addArticle', 'XemController@addArticle');
// ico
Route::get('ico', 'IcoController@index');
// medium
Route::get('callback/medium', 'CallbackController@medium');

//truncate
Route::get('truncate', 'TruncateController@index');

Route::get('ada', 'AdaController@index');

// rss

Route::get('rss.xml', function () {

   /* create new feed */
   $feed = App::make("feed");

   /* creating rss feed with our most recent 20 posts */
   $posts = \DB::table('articles')->orderBy('created_at', 'desc')->take(10)->get();

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
