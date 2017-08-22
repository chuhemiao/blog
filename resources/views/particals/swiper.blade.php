<div class="container">
    <!-- 轮播 -->

    <div class="jumbotron text-center">
        <div class="row">
            <div class="col-md-8 ">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                	<ol class="carousel-indicators">
                	@forelse($new_articles as $article)
					    <li data-target="{{ url($article->slug) }}.html" data-slide-to="{{ $article->title }}" class=""> </li>
					    @empty
		                <h3 class="text-center">{{ lang('Nothing') }}</h3>
		            @endforelse
				 	 </ol>
					<div class="carousel-inner" role="listbox">
					@forelse($new_articles as $article)
						
						<div class="item @if ($loop->first) active @endif">
						
						  <a href="{{ url($article->slug) }}.html"><img src="{{ $article->page_image }}" class="img-responsive"  alt="{{ $article->slug }}"></a>
						  <div class="carousel-caption">
						    <a href="{{ url($article->slug) }}.html"><h3>{{ $article->title }}</h3></a>
						  </div>
						</div>
					@empty
		                <h3 class="text-center">{{ lang('Nothing') }}</h3>
		            @endforelse
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="icon-prev" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="icon-next" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
            </div>
            <div class="col-md-4">
            	<h3>技术头条<br/>
					@forelse($tech_articles as $article)
				  	<a href="{{ url($article->slug) }}.html"><small class="text-muted">{{ str_limit($article->title,25) }}</small></a><br/>
				  	@empty
		                <h3 class="text-center">{{ lang('Nothing') }}</h3>
		            @endforelse

				</h3>
				<h3>热门头条<br/>
					@forelse($hot_articles as $article)
				  	<a href="{{ url($article->slug) }}.html"><small class="text-muted">{{ str_limit($article->title,25) }}</small></a><br/>
				  	@empty
		                <h3 class="text-center">{{ lang('Nothing') }}</h3>
		            @endforelse

				</h3>
            </div>
           
        </div>
    </div>
    
    <!-- 轮播end -->
</div>