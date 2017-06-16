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
                </ul>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span>{!! config('blog.footer.meta') !!}</a>
    </div>
</footer>