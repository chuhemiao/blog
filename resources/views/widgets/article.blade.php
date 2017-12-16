<div class="container list">
    <div class="row">
        <div class="col-md-8">
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
                                    <i class="ion-ios-eye"></i>{{ $article->view_count }}
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
                <div class="panel-heading">合作专栏</div>
                <div class="panel-body">
                    <a href="http://www.nemchina.com/" class="thumbnail" target="_blank">
                      <img src="https://cdn.btxiaobai.com/article/2017/11/22/ASb2iTJjfpmFatmNxuuOJHfwT1UuW3cHRie28Uea.png" alt="nemchina" width="250" height="100%">
                    </a>
                    <a href="https://bihu.com/" class="thumbnail" target="_blank">
                      <img src="http://cdn.btxiaobai.com/article/2017/11/22/OOaxnuhv3EkdOJ1mzfcmL46yBQWcIqQ1lwEAQTJ8.png" alt="币乎社区" width="144" height="100%">
                    </a>
                    <a href="http://www.ctpmall.com/" class="thumbnail" target="_blank">
                        <img src="https://cdn.btxiaobai.com/2017/12/16/WechatIMG58.jpeg" alt="ctpmall" width="144" height="100%">
                    </a>
                </div>
            </div>

        </div>  
    </div>

