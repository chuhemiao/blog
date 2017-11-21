<div class="container">
    <!-- 轮播 -->
    <hr>

    <div class="jumbotron text-center" style="padding-bottom:5px">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:10px">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                	<ol class="carousel-indicators">
                	@forelse($carousel_list as $article)
					    <li data-target="{{ url($article->slug) }}.html" data-slide-to="{{ $article->title }}" class=""> </li>
					    @empty
		                <h3 class="text-center">{{ lang('Nothing') }}</h3>
		            @endforelse
				 	 </ol>
					<div class="carousel-inner" role="listbox">
					@forelse($carousel_list as $article)
						
						<div class="item @if ($loop->first) active @endif">
						
						  <a href="{{ url($article->slug) }}.html"><img src="{{ $article->page_image }}" class="img-responsive"  alt="{{ $article->slug }}" width="500px" height="400px"></a>
						  <div class="carousel-caption">
						    <a href="{{ url($article->slug) }}.html"><h4>{{ str_limit($article->title,25) }} </h4></a>
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
				<!-- 轮播end -->
				
            </div>
        </div>
    </div>
    
    <!-- 轮播end -->
</div>