<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">
    <link rel="canonical" href="https://btxiaobai.com"/>
    <script src="//msite.baidu.com/sdk/c.js?appid=1571073467972034"></script>

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

    @yield('styles')
</head>
<body>
    <script>cambrian.render('head')</script>

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
    <script>
    $(function() {
        showNotice();
    });

    function showNotice() {   
        Notification.requestPermission(function (perm) {  
            if (perm == "granted") {  
                var notification = new Notification("这是一个通知撒:", {  
                    dir: "auto",  
                    lang: "hi",  
                    tag: "比特币小白",  
                    icon: "https://cdn.btxiaobai.com/article/2017/10/26/Zx3KZvYitDPa17J7dMlhPuGY3cniOa9XYL75toZf.png",  
                    body: "您可以第一时间收取到相关更新!"  
                });  
            }  
        })  
    }  
    </script>
                        

</body>
</html>
