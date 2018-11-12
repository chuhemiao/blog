<div class="container list" style="padding-top: 15px;">
    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-info">

                  <div class="panel-heading">头条看点</div>
                  <div class="panel-body">
                   @forelse($everyday_articles as $article)
                    <div class="media">
                        @if($article->page_image)
                        <a class="media-left" href="{{ url($article->slug) }}" target="_blank">
                            <img alt="{{ $article->slug }}" src="{{ $article->page_image }}" data-holder-rendered="true">
                        </a>
                        @endif
                        <div class="media-body">
                            <h6 class="media-heading">
                                <a href="{{ url($article->slug) }}"  target="_blank">
                                    {{ $article->title }}
                                </a>
                            </h6>
                            {{--<div class="description">--}}
                                {{--{{ $article->meta_description }}--}}
                            {{--</div>--}}
                            <div class="extra">
                                @foreach($article->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}"  target="_blank">
                                    <div class="label"><i class="ion-pricetag"></i>{{ $tag->tag }}</div>
                                </a>
                                @endforeach

                                <div class="info">
                                    <i class="ion-person"></i>{{ $article->user->name or 'null' }}&nbsp;,&nbsp;
                                    <i class="ion-clock"></i>{{ $article->published_at->diffForHumans() }}&nbsp;,&nbsp;
                                    <i class="ion-social-bitcoin-outline"></i>{{ $article->view_count+1042 }}
                                    <a href="{{ url($article->slug) }}" class="pull-right">
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
                <div class="panel-heading">合作伙伴</div>
                <div class="panel-body">
                    <a href="http://www.btsanyan.com/" class="thumbnail" target="_blank">
                        <img src="https://cdn.btxiaobai.com/2018/07/03/WechatIMG3678.png" alt="比特三言,三言两语来聊币" width="330px" height="100%">
                    </a>

                    <a href="https://bsatoshi.com/" class="thumbnail" target="_blank">
                        <img src="https://cdn.bsatoshi.com/images/bsatoshi_dac.png" alt="币聪财经-全球首款DAC媒体平台" width="330px" height="100%">
                    </a>
                </div>
            </div>


            <div class="panel panel-info">
                <div class="panel-heading"><?php echo date('m-d',time()); ?>&nbsp;|&nbsp; 25小时快讯</div>
                <div class="timeline-centered">

                    <?php
                        foreach ($articles as $k=>$v){
                    ?>

                    <article class="timeline-entry">

                        <div class="timeline-entry-inner">

                            <div class="timeline-icon bg-<?php
                                $arr = ['success','secondary','info','warning'];
                                echo $arr[rand(0,3)];
                            ?>">
                                <i class="entypo-feather"></i>
                            </div>

                            <div class="timeline-label">

                                <a href="{{ url($article->slug) }}"  target="_blank">
                                <p>
                               <?php
                                    echo '【'.$v->title.'】'.'<br/>'.$v->meta_description;
                                ?>
                                </p>
                                </a>
                            </div>
                        </div>

                    </article>
                        <?php } ?>

                </div>
            </div>

        </div>  
    </div>

