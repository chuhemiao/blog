<!DOCTYPE html>
    <title>比特币小白-交易市场导航</title>
    <meta name="keywords" content="梦遥奇缘,比特币,莱特币,狗狗币,比特股,瑞波币,比特小白,比特币小白,央行数字币,ICO,挖矿">
    <meta name="description" content="比特币小白，专注对数字币新闻与ICO消息传播，让更多的人了解到区块链、认识数字币。">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="{{ URL::asset('//source.shengxuezixun.com/btxiaobai/css/style.css') }}" rel="stylesheet" type="text/css">

    <div id="wrapper-container">
    
        <div class="container object">

            <div id="main-container-image" style="opacity: 1;">
                       
                    <section class="work">
                        @forelse($links as $link)
                        <figure class="white">
                            <a href="{{ $link->link }}">
                                <img src="{{ $link->image }}" alt="">
                                <dl>
                                    <dt>{{ $link->name }}</dt>
                                </dl>
                            </a>
                            <div id="wrapper-part-info">
                                <div id="part-info">{{ $link->name }}</div>
                            </div>
                        </figure> 
                        @empty
                        <li><h3>{{ lang('Nothing') }}</h3></li>
                        @endforelse  
                        
                    </section>
                    
                </div>  
                    
            </div>
         
  
    </div>
    <script src="//source.shengxuezixun.com/btxiaobai/css/jquery.min.js"></script>
    <script type="text/javascript" src="//source.shengxuezixun.com/btxiaobai/css/jquery.localScroll.min.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68661235-5', 'auto');
        ga('send', 'pageview');
    </script>

