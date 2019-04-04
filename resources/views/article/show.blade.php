@extends('layouts.app')

@section('title', $article->title)


@section('content')
    @component('particals.jumbotron')
        <h4>{{ $article->title }}</h4>

        <!-- <h6>{{ $article->subtitle }}</h6> -->

        <div class="header">
            <i class="ion-person"></i>{{ $article->user->name or 'null' }}，
            @if(count($article->tags))
            <i class="ion-pricetag"></i>
                @foreach($article->tags as $tag)
                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>，
                @endforeach
            @endif
            <i class="ion-clock"></i>{{ $article->published_at->diffForHumans() }}
        </div>
    @endcomponent

    <div class="article container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <parse content="{{ json_decode($article->content)->raw }}"></parse>


            @if($article->is_original)
                <div class="publishing alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! config('blog.license') !!}
                </div>
                @endif
                @if(config('blog.social_share.article_share'))
                <div class="footing">
                    <div class="social-share"
                        data-title="{{ $article->title }}"
                        data-description="{{ $article->title }}"
                        {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }}
                        {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }}
                        initialized></div>
                </div>
                @endif

                {{--推荐阅读文章--}}
                <div class="panel panel-info">
                    <div class="panel-heading" style="margin-bottom: 15px;">推荐阅读</div>
                    <div class="panel-body">
                        <?php
                        foreach ($new_articles as $k=>$v){
                        ?>
                        <a href="<?php echo $v->slug; ?>" style="text-align: center;float:left"  target="_blank">
                            <h6><?php echo $v->title; ?></h6>
                        </a><br/><br/>

                        <?php
                        }
                        ?>

                    </div>

                </div>
        </div>
    </div>

    @if(Auth::guest())
        <comment title="评论"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"></comment>
    @else
        <comment title="评论"
                 username="{{ Auth::user()->name }}"
                 user-avatar="{{ Auth::user()->avatar }}"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"
                 can-comment></comment>
    @endif
<script type="application/ld+json">
{
    "@context":"https://zhanzhang.baidu.com/contexts/cambrian.jsonld",
    "@id":"{{ url($article->slug) }}.html",
    "title":"{{ $article->title }}",
    "images":[
        "https://cdn.btxiaobai.com/article/2017/09/21/3FjRPCI635TFPHViuAaGa8kqzr0RTWTgjdTClOiN.png",
        "https://cdn.btxiaobai.com/article/2017/09/21/TZpJXC0I7rV9YkG8gkrw0T4LL3XysM87y6KB5ifs.png",
        "https://cdn.btxiaobai.com/article/2017/09/20/mPUtYXFtBOz3N9M9bcGO1TIztbzJmDtHOSKqnchL.png"
        ],
    "description":"{{  $article->subtitle  }}",
    "pubDate":"{{  date('Y-m-d',strtotime($article->published_at)).'T'.date('H:i:s',strtotime($article->published_at))  }}"
}
</script>

@endsection

    

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection


