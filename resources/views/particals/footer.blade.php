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
                            <i class="large ion-transgender"></i>
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
                     <li>
                        <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=f9232bb88ae3158ea9e5d919011ca397b11699d3f0bda65f009ecc6d289587c4"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="比特币小白" title="比特币小白"></a>
                    </li>
                </ul>
                <div class="links">
                    <a href="http://idiot6.com/">友情链接</a> 
                    <a href="https://t.me/joinchat/FlB-8A7mrjWqjV3s00bprA">TG群</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</a>
    </div>
</footer>