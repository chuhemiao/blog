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
                <div class="panel-heading">24小时快讯</div>
                <div class="panel-body">
                     <iframe id="weibo" style="width:360px; height:544px;" frameborder="0" scrolling="no" src="//service.weibo.com/widget/widget_blog.php?uid=3292942135"></iframe>  
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

