<footer id="footer" class="footer">
    <div class="container text-center">
        <div class="row content">
            <div class="col-md-4 col-md-offset-4">
                <ul class="connect">
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="large ion-ios-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ config('blog.footer.weibo.url') }}">
                            <i class="large ion-at"></i>
                        </a>
                    </li>
                    @if(config('blog.footer.twitter.open'))
                    <li>
                        <a href="{{ config('blog.footer.twitter.url') }}" target="_blank">
                            <i class="large ion-social-twitter"></i>
                        </a>
                    </li>
                    @endif
                    @if(config('blog.footer.telegram.open'))
                    <li>
                        <a href="{{ config('blog.footer.telegram.url') }}" target="_blank">
                            <i class="large ion-ios-book-outline"></i>
                        </a>
                    </li>
                    @endif
                </ul>
                <div class="sponsors">
                    <a href="http://www.jinse.com/member/23200" target="_blank">金色财经</a>
                    <a href="http://www.gongxiangcj.com/" target="_blank">共享财经</a>
                    <a href="http://www.weilaicaijing.com/" target="_blank">未来财经</a>
                    <a href="https://www.iotachina.com/" target="_blank">IOTA中国</a>
                    <a href="https://www.huobi.pro/" target="_blank">火币网</a>
                    <a href="http://k.quintar.com" target="_blank">金塔</a>
                </div>
                <div class="sponsors">
                    <a href="https://zaif.jp/" target="_blank">Zaif</a> 
                    <a href="https://www.okex.com/" target="_blank">Okex</a>
                    <a href="https://bite.ceo/" target="_blank">CEO</a>
                    <a href="http://www.bit2100.com/" target="_blank">Bit2100</a> 
                    <a href="https://www.bitfinex.com/" target="_blank">Bitfinex</a>
                    <a href="https://www.binance.com/" target="_blank">Binance</a>
                    <a href="https://www.btc123.com/" target="_blank">BTC123</a>
                </div>
                <div class="sponsors">
                    <a href="https://btc.com/" target="_blank">区块浏览器</a> 
                    <a href="https://coinmarketcap.com/" target="_blank">币市宝典</a> 
                    <a href="http://www.feixiaohao.com/" target="_blank">非小号</a>
                    <a href="http://www.8btc.com/" target="_blank">巴比特</a>
                    <a href="http://chainb.com" target="_blank">铅笔</a>
                    <a href="http://chainknow.com/" target="_blank">知链</a>
                    <a href="https://www.7234.cn/" target="_blank">链世界</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</a>
    </div>
</footer>