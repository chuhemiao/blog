<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">{{ lang('Articles') }}</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('/iota/everyweek') }}" style='min-width:100%'>{{ lang('Bite Point') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style='min-width:100%'>
                      <li><a href="{{ url('discussion') }}">{{ lang('Discussions') }}</a></li>
                      <li><a href="{{ url('/iota/everyweek') }}">{{ lang('Every Week Day') }}</a></li>
                      <li><a href="{{ url('/iota/bitetech') }}">{{ lang('Bite Tech') }}</a></li>
                      <li><a href="{{ url('/iota/bitebasic') }}">{{ lang('Bite Basic') }}</a></li>
                      <li><a href="{{ url('/ico/') }}" target="_blank">{{ lang('ICO') }}</a></li>

                    </ul>
                </li>

                <li><a href="{{ url('link') }}" target="_blank">{{ lang('Coinmarkets') }}</a></li>
                <li><a href="{{ url('/coinmarket/marketall') }}" target="_blank">{{ lang('Quotes') }}</a></li>
                <li><a href="{{ url('/coinmarket/coinmarketcap') }}" target="_blank">{{ lang('Market Price') }}</a></li>
                <li><a href="{{ url('/iota/') }}" target="_blank">{{ lang('IOTA') }}</a></li>
                <li><a href="{{ url('/xem/') }}" target="_blank">{{ lang('Xems') }}</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;" style='min-width:100%'>{{ lang('Wallet Ore') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style='min-width:100%'>
                        <li><a href="{{ url('/iota/wallet') }}" target="_blank">{{ lang('Wallet') }}</a></li>
                        <li><a href="{{ url('/iota/ore') }}" target="_blank">{{ lang('Ore') }}</a></li>
                    </ul>
                </li>
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Search Box -->
                <li>
                    <form class="navbar-form navbar-right search" role="search" method="get" action="{{ url('search') }}">
                        <input type="text" class="form-control" name="q" placeholder="{{ lang('Search') }}" required>
                    </form>
                </li>

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('login') }}">{{ lang('Login') }}</a></li>
                    <li><a href="{{ url('register') }}">{{ lang('Register') }}</a></li>
                @else
                    <li class="notification">
                        <a href="{{ url('user/notification') }}"><i class="ion-android-notifications">
                            <span class="new" 
                            @if (Auth::user()->unreadNotifications->count() > 0)
                            style='display: block'
                            @endif
                            >
                            </span>
                        </i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->nickname ?: Auth::user()->name }}
                            <b class="caret"></b>&nbsp;&nbsp;
                            <img class="avatar img-circle" src="{{ Auth::user()->avatar }}">
                        </a>

                        <ul class="dropdown-menu text-center" role="menu">
                            <li><a href="{{ url('user', ['name' => Auth::user()->name]) }}"><i class="ion-person"></i>{{ lang('Personal Center') }}</a></li>
                            <li><a href="{{ url('setting') }}"><i class="ion-gear-b"></i>{{ lang('Settings') }}</a></li>
                            @if(Auth::user()->is_admin)
                                <li><a href="{{ url('dashboard') }}"><i class="ion-ios-speedometer"></i>{{ lang('Dashboard') }}</a></li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="ion-log-out"></i>{{ lang('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="sns  hidden-xs" >
    <div class="wrapper">
        <div class="wx-box">
            <p><i></i>微信公众号</p>
            <p>公众号：比特小白</p>
            <img src="https://cdn.btxiaobai.com/article/2017/10/31/nNeMRDvsSmPtuH1qKufBAJCVGXrU5RMzUQCejn1t.png">
            <p>扫一扫关注微信</p>
        </div>
        <div class="sina-box">
            <a href="http://www.weibo.com/chuhemiao"><p><i></i>新浪微博</p></a>
            <p><a href="http://www.weibo.com/chuhemiao">梦遥奇缘</a></p>
        </div>
        <div class="qq-box">
            <a href="http://shang.qq.com/wpa/qunwpa?idkey=f9232bb88ae3158ea9e5d919011ca397b11699d3f0bda65f009ecc6d289587c4"><p><i></i>官方QQ群</p></a>
            <a href="http://shang.qq.com/wpa/qunwpa?idkey=f9232bb88ae3158ea9e5d919011ca397b11699d3f0bda65f009ecc6d289587c4"><p>比特币小白官方群<em>83729696</em></p></a>
        </div>
    </div>
</div>