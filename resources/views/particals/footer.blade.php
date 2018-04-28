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
                    <a href="https://btc.com/" target="_blank">区块浏览器</a>
                    <a href="http://www.bcfans.com/" target="_blank">区块链导航</a>
                    <a href="http://news.tangwen.org" target="_blank">汤问资讯</a>
                    <a href="http://www.178bit.com/" target="_blank">口袋比特</a>
                    <a href="https://www.huobi.pro/" target="_blank">火币</a>
                    <a href="http://quintar.com" target="_blank">金塔</a>
                    <a href="https://www.bitask.org/" target="_blank">币问</a>
                </div>
                <div class="sponsors">
                    <a href="https://zaif.jp/" target="_blank">Zaif</a> 
                    <a href="https://gate.io/signup/647923" target="_blank">GATE</a>
                    <a href="https://vip.zb.com/activity/joinbtc?tuijianid=aac973789ed3b8646ec13fb1096234f2" target="_blank">ZB</a>
                    <a href="http://www.bit2100.com/" target="_blank">Bit2100</a> 
                    <a href="https://www.bitfinex.com/" target="_blank">Bitfinex</a>
                    <a href="https://www.binance.com/?ref=10895002/" target="_blank">Binance</a>
                    <a href="https://www.epay.com/?ref=748479" target="_blank">易派支付</a>
                </div>
                <div class="sponsors">
                    <a href="http://www.btweek.com/" target="_blank">区块链周刊</a>
                    <a href="https://coinmarketcap.com/" target="_blank">币宝典</a>
                    <a href="http://www.feixiaohao.com/" target="_blank">非小号</a>
                    <a href="http://www.8btc.com/" target="_blank">巴比特</a>
                    <a href="http://chainb.com" target="_blank">铅笔</a>
                    <a href="http://www.hemabit.com" target="_blank">河马</a>
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