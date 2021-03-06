<?php

return [

    // Mail Notification
    'mail_notification' => env('MAIL_NOTIFICATION') ?: false,

    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/images/default.png',

    // Default Icon
    // 'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',

    // Meta
    'meta' => [
        'keywords' => '德聪科技,币聪财经,比特币日报,币狙击,比特小白,比特币小白,比特币新闻,央行数字币,币小白,ERC721,挖矿,IOTA,CoinMarketCap,Blockchain,ada,艾达币,IOHK,区块链开发,tangle,区块链技术,新经币',
        'description' => '比特币小白，专注对数字币新闻与区块链技术传播，让更多的人了解到区块链、认识数字币。'
    ],


    // Social Share
    'social_share' => [
        'article_share'    => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'google,twitter,weibo,facebook,douban,linkedin',
        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter,weibo,qq,wechat,facebook,douban',
    ],

    // Google Analytics
    'google' => [
        'id'   => env('GOOGLE_ANALYTICS_ID', 'UA-68661235-5'),
        'open' => env('GOOGLE_OPEN') ?: true
    ],

    // Article Page
    'article' => [
        'title'       => '比特币小白-专注对数字币新闻与区块链技术咨询',
        'description' => '比特币小白，专注对数字币新闻与区块链技术传播，让更多的人了解到区块链、认识数字币。',
        'number'      => 18,
        'sort'        => 'desc',
        'sortColumn'  => 'published_at',
    ],


    // Discussion Page
    'discussion' => [
        'number' => 20,
        'sort'   => 'desc',
        'sortColumn' => 'created_at',
    ],

    // Footer
    'footer' => [
        'github' => [
            'open' => true,
            'url'  => 'https://www.toutiao.com/c/user/50450823653/#mid=50448672317',
        ],
        'twitter' => [
            'open' => true,
            'url'  => 'https://twitter.com/meng535101602'
        ],
        'weibo' => [
            'open' => true,
            'url'  => 'http://www.weibo.com/bsatoshi'
        ],
        'telegram' => [
            'open' => true,
            'url'  => 'https://www.facebook.com/btxiaobai/?ref=bookmarks'
        ],
        'meta' => '©比特币小白 2017.署名-非商业性使用-相同方式共享（BY-NC-SA 3.0 CN）<a ref="nofollow" href="http://www.beian.gov.cn/">京ICP备15026980号-5</a> <a rel="sitemap" href="/sitemap.xml">币站地图</a>&nbsp;&nbsp;<a rel="RSS" href="/rss.xml"><i class="ion-social-rss"></i></a> <br/>郑重声明：本站除标明"本站原创"外所有信息均搜集转载自互联网 版权归原作者所有 &nbsp;&nbsp;<a rel="about" href="/link/about">关于我们</a>',
    ],

    'license' => '比特币小白.<br/>This article is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.',


];
