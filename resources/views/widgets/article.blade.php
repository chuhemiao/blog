<div class="container list" style="padding-top: 15px;">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">市场行情</div>
                <div class="panel-body">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text">Bitcoin and Altcoin Prices</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                            {
                                "title_raw": "Cryptocurrencies",
                                "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                                "gridLineColor": "rgba(233, 233, 234, 1)",
                                "scaleFontColor": "rgba(218, 221, 224, 1)",
                                "title": "Cryptocurrencies",
                                "tabs": [
                                {
                                    "title_raw": "Overview",
                                    "symbols": [
                                        {
                                            "s": "BITFINEX:BTCUSD"
                                        },
                                        {
                                            "s": "BITFINEX:ETHUSD"
                                        },
                                        {
                                            "s": "BITFINEX:XRPUSD"
                                        },
                                        {
                                            "s": "COINBASE:BCHUSD"
                                        },
                                        {
                                            "s": "COINBASE:LTCUSD"
                                        },
                                        {
                                            "s": "BITFINEX:IOTUSD"
                                        }
                                    ],
                                    "title": "Overview"
                                },
                                {
                                    "title_raw": "Bitcoin",
                                    "symbols": [
                                        {
                                            "s": "BITFINEX:BTCUSD"
                                        },
                                        {
                                            "s": "COINBASE:BTCEUR"
                                        },
                                        {
                                            "s": "COINBASE:BTCGBP"
                                        },
                                        {
                                            "s": "BITFLYER:BTCJPY"
                                        },
                                        {
                                            "s": "WEX:BTCRUR"
                                        },
                                        {
                                            "s": "CME:BTC1!"
                                        }
                                    ],
                                    "title": "Bitcoin"
                                },
                                {
                                    "title_raw": "Ripple",
                                    "symbols": [
                                        {
                                            "s": "BITFINEX:XRPUSD"
                                        },
                                        {
                                            "s": "KRAKEN:XRPEUR"
                                        },
                                        {
                                            "s": "KORBIT:XRPKRW"
                                        },
                                        {
                                            "s": "BITSO:XRPMXN"
                                        },
                                        {
                                            "s": "BINANCE:XRPBTC"
                                        },
                                        {
                                            "s": "BITTREX:XRPETH"
                                        }
                                    ],
                                    "title": "Ripple"
                                },
                                {
                                    "title_raw": "Ethereum",
                                    "symbols": [
                                        {
                                            "s": "COINBASE:ETHUSD"
                                        },
                                        {
                                            "s": "KRAKEN:ETHEUR"
                                        },
                                        {
                                            "s": "KRAKEN:ETHGBP"
                                        },
                                        {
                                            "s": "KRAKEN:ETHJPY"
                                        },
                                        {
                                            "s": "POLONIEX:ETHBTC"
                                        },
                                        {
                                            "s": "WEX:ETHLTC"
                                        }
                                    ],
                                    "title": "Ethereum"
                                },
                                {
                                    "title_raw": "Bitcoin Cash",
                                    "symbols": [
                                        {
                                            "s": "COINBASE:BCHUSD"
                                        },
                                        {
                                            "s": "BITSTAMP:BCHEUR"
                                        },
                                        {
                                            "s": "CEXIO:BCHGBP"
                                        },
                                        {
                                            "s": "POLONIEX:BCHBTC"
                                        },
                                        {
                                            "s": "HITBTC:BCHETH"
                                        },
                                        {
                                            "s": "WEX:BCHLTC"
                                        }
                                    ],
                                    "title": "Bitcoin Cash"
                                }
                            ],
                                "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                                "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                                "showChart": true,
                                "title_link": "/markets/cryptocurrencies/prices-all/",
                                "locale": "en",
                                "symbolActiveColor": "rgba(242, 250, 254, 1)",
                                "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                                "height": 660,
                                "width": 750
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            <div class="panel panel-info">

                  <div class="panel-heading">头条看点</div>
                  <div class="panel-body">
                   @forelse($articles as $article)
                    <div class="media">
                        @if($article->page_image)
                        <a class="media-left" href="{{ url($article->slug) }}.html">
                            <img alt="{{ $article->slug }}" src="{{ $article->page_image }}" data-holder-rendered="true">
                        </a>
                        @endif
                        <div class="media-body">
                            <h6 class="media-heading">
                                <a href="{{ url($article->slug) }}.html">
                                    {{ $article->title }}
                                </a>
                            </h6>
                            {{--<div class="description">--}}
                                {{--{{ $article->meta_description }}--}}
                            {{--</div>--}}
                            <div class="extra">
                                @foreach($article->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                    <div class="label"><i class="ion-pricetag"></i>{{ $tag->tag }}</div>
                                </a>
                                @endforeach

                                <div class="info">
                                    <i class="ion-person"></i>{{ $article->user->name or 'null' }}&nbsp;,&nbsp;
                                    <i class="ion-clock"></i>{{ $article->published_at->diffForHumans() }}&nbsp;,&nbsp;
                                    <i class="ion-social-bitcoin-outline"></i>{{ $article->view_count+1042 }}
                                    <a href="{{ url($article->slug) }}.html" class="pull-right">
                                        Read More <i class="ion-ios-arrow-forward"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h3 class="text-center">{{ lang('Nothing') }}</h3>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">币优:持仓盈亏实时追踪</div>
                <div class="panel-body">
                    <a href="https://www.bituniverse.org/" class="thumbnail" target="_blank">
                        <img src="https://cdn.btxiaobai.com/2018/05/17/15265699033998.jpg" alt="bituniverse" width="330px" height="100%">
                    </a>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">25小时快讯</div>
                <div class="panel-body">
                     <a class="twitter-timeline" href="https://twitter.com/meng535101602?ref_src=twsrc%5Etfw">Tweets by meng535101602</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">币圈小白小秘圈：微信扫码加入</div>
                <div class="panel-body">
                    <a href="javascript:;" class="thumbnail" target="_blank">
                        <img src="https://cdn.btxiaobai.com/2017/12/16/15134416543540.jpg" alt="nemchina" width="115px" height="100%">
                    </a>
                </div>
            </div>

        </div>  
    </div>

