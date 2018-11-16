<footer id="footer" class="footer" style="height:250px">
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
                    <a href="https://bsatoshi.com/" target="_blank">币聪财经</a>
                    <a href="http://www.btsanyan.com/" target="_blank">比特三言</a>
                    <a href="https://www.bsatoshi.love/" target="_blank">笺信DAPP</a>
                    <a href="http://www.dailybtc.cn/" target="_blank">比特币日报</a>
                    <a href="https://www.investinblockchain.com/" target="_blank">Invest</a>



                </div>
                <div class="sponsors">
                    <a href="http://www.ecbec.com.cn/" target="_blank">区块链开发</a>
                    <a href="http://www.bcfans.com/" target="_blank">区块链导航</a>
                    <a href="http://news.tangwen.org" target="_blank">汤问资讯</a>
                    <a href="http://www.178bit.com/" target="_blank">口袋比特</a>
                    <a href="http://quintar.com" target="_blank">金塔</a>

                </div>
                <div class="sponsors">
                    <a href="http://www.xicaijing.com/" target="_blank">烯财经</a>
                    <a href="https://www.bitool.cn/" target="_blank">币兔网</a>
                    <a href="https://vip.zb.com/activity/joinbtc?tuijianid=aac973789ed3b8646ec13fb1096234f2" target="_blank">ZB</a>
                    <a href="http://www.allcmc.com/" target="_blank">allcmc</a>
                    <a href="https://www.binance.com/?ref=10895002/" target="_blank">Binance</a>
                    <a href="https://www.epay.com/?ref=748479" target="_blank">易派支付</a>
                </div>
                <div class="sponsors">
                    <a href="http://www.btweek.com/" target="_blank">区块链周刊</a>
                    <a href="https://coinmarketcap.com/" target="_blank">币宝典</a>
                    <a href="http://www.feixiaohao.com/" target="_blank">非小号</a>
                    <a href="http://www.qu75.com" target="_blank">75区块链</a>
                    <a href="http://chainknow.com/" target="_blank">知链</a>
                    <a href="https://www.7234.cn/" target="_blank">链世界</a>
                </div>
                <div class="sponsors">
                    {{--<div class="title">CDN 支持</div>--}}
                    <a href="https://www.upyun.com/"><img width="150" src="https://cdn.bsatoshi.com/img/upyun_logo5.png">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</span>
    </div>
</footer>