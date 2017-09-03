<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title', config('app.title'))</title>

    <link rel="stylesheet" href="{{ mix('css/home.css') }}">

    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-4071771803476867",
        enable_page_level_ads: true
      });
    </script>
    @if(config('blog.google.open'))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
    @endif
    <style>
        /*sns*/
        .sns {
            height: 508px;
            position: absolute;
            top: 240px;
            left: 0px;
            z-index: 7;
        }

        .sns i,
        .sns em {
            display: inline-block;
            font-style: normal;
        }

        .sns .wrapper {
            width: 160px;
            background-color: #52697f;
            float: left;
            text-align: center;
        }

        .sns .wrapper div {
            border-bottom: 1px solid #565b6d;
        }

        .sns .wrapper div p {}

        .sns .wrapper div p:nth-child(1) {
            color: #fff;
            font-size: 14px;
            margin: 14px 0px 9px 0px;
        }

        .sns .wrapper div p:nth-child(1) i {
            margin: 0px 5px 0px 0px;
            vertical-align: middle;
        }

        .sns .wrapper div:last-child {
            border: 0px;
        }

        .sns .wrapper .wx-box img {
            width: 115px;
            height: 115px;
        }

        .sns .wrapper .wx-box p:nth-child(1) i {
            width: 25px;
            height: 22px;
            background: url("https://cdn.btxiaobai.com/article/2017/08/24/lsE8MZ8svckMQaqRYbYrgoeBUKaWEube5aSOG35B.png") 0px 0px;
        }

        .sns .wrapper .wx-box p:nth-child(2) {
            color: #fff;
        }

        .sns .wrapper .wx-box p:nth-child(4) {
            color: #c5c5c5;
            margin-bottom: 5px;
        }

        .sns .wrapper .wx-box img {
            width: 115px;
            height: 115px;
        }

        .sns .wrapper .sina-box p:nth-child(1) i {
            width: 24px;
            height: 22px;
            background: url("https://cdn.btxiaobai.com/article/2017/08/24/lsE8MZ8svckMQaqRYbYrgoeBUKaWEube5aSOG35B.png") -27px 0px;
        }

        .sns .wrapper .sina-box p:nth-child(2) {
            background-color: #fff;
            padding: 5px;
            display: block;
            width: 107px;
            margin: 0px 34px 9px 26px;
        }

        .sns .wrapper .sina-box p:nth-child(2) a {
            color: #5d77a5;
        }

        .sns .wrapper .qq-box p:nth-child(1) i {
            width: 19px;
            height: 22px;
            background: url("https://cdn.btxiaobai.com/article/2017/08/24/lsE8MZ8svckMQaqRYbYrgoeBUKaWEube5aSOG35B.png") -55px 0px;
        }

        .sns .wrapper .qq-box p:nth-child(2) {
            color: #5d77a5;
            margin-bottom: 14px;
        }

        .sns .wrapper .qq-box p:nth-child(2) em {
            width: 100%;
            text-align: center;
            color: #c5c5c5;
        }

        /*swipper*/
        .carousel-fade .carousel-inner .item{ opacity:0; -webkit-transition-property:opacity;-moz-transition-property:opacity ; -ms-transition-property:opacity;-o-transition-property:opacity;transition-property:opacity ;}
        .carousel-fade .carousel-inner .active{ opacity: 1;}
        .carousel-fade .carousel-inner .active.left,.carousel-fade .carousel-inner .active.right{left: 0;opacity: 0;}
        .carousel-fade .carousel-inner .next.left,
        .carousel-fade .carousel-inner .prev.right {opacity: 1;}
    </style>

    @yield('styles')
</head>
<body>
    <div id="app">
        @include('particals.navbar')
        <div class="main">
            @yield('content')
        </div>

        @include('particals.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/home.js') }}"></script>

    @yield('scripts')

    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>

    
   <script type="text/javascript">
        window._pt_lt = new Date().getTime();
        window._pt_sp_2 = [];
        _pt_sp_2.push('setAccount,1c850326');
        var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        (function() {
            var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
            atag.src = _protocol + 'js.ptengine.cn/1c850326.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(atag, s);
        })();
    </script>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?caab43b2dd9eae94737bf70ffce6aa0f";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
    <script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    </script>
                        

</body>
</html>
