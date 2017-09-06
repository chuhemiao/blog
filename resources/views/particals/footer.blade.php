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
                    @if(config('blog.footer.github.open'))
                    <li>
                        <a href="{{ config('blog.footer.github.url') }}" target="_blank">
                            <i class="large ion-social-github icon"></i>
                        </a>
                    </li>
                    @endif
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
                    <li>
                        <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=f9232bb88ae3158ea9e5d919011ca397b11699d3f0bda65f009ecc6d289587c4"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="比特币小白" title="比特币小白"></a>
                    </li>
                </ul>
                <div class="sponsors">
                    <a href="http://idiot6.com/" target="_blank">梦遥奇缘</a>
                    <a href="https://www.iotachina.com/" target="_blank">IOTA中国</a>
                    <a href="http://www.bit97.com/" target="_blank">汇联矿业</a> 
                    <a href="http://btc38.com/" target="_blank">比特时代</a> 
                    <a href="https://www.huobi.com/" target="_blank">火币网</a>
                    <a href="https://www.800bitbank.com/" target="_blank">巴比网</a>
                    <a href="https://zaif.jp/" target="_blank">zaif</a> 
                </div>
                <div class="sponsors">
                    <a href="https://toubi.com/" target="_blank">投币网</a>
                    <a href="https://www.yuanbao.com/coins" target="_blank">元宝网</a>
                    <a href="https://www.btcchina.com/" target="_blank">BtcChina</a> 
                    <a href="https://www.okcoin.cn/" target="_blank">okcoin</a> 
                    <a href="https://www.bitfinex.com/" target="_blank">bitfinex</a>
                    <a href="https://www.btc123.com/" target="_blank">BTC123</a>
                    <a href="http://www.nemchina.com/" target="_blank">XEM</a> 
                </div>
                <div class="sponsors">
                    <a href="https://btc.com/" target="_blank">区块浏览器</a> 
                    <a href="https://cn.bter.com/" target="_blank">比特儿</a>
                    <a href="https://coinmarketcap.com/" target="_blank">币市宝典</a> 
                    <a href="http://www.feixiaohao.com/" target="_blank">非小号</a>
                    <a href="http://www.8btc.com/" target="_blank">巴比特</a>
                    <a href="http://chainb.com" target="_blank">铅笔</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</a>
    </div>
</footer>