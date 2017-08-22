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
						    <a href="{{ url($article->slug) }}.html"><h3>{{ str_limit($article->title,25) }} </h3></a>
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
					
	           <div class="tabbable tabs-left">
	              <ul class="nav nav-tabs">
	                <li class="active"><a href="#lA" data-toggle="tab">小白头条</a></li>
	                <li class=""><a href="#lB" data-toggle="tab">技术头条</a></li>
	                <li class=""><a href="#lC" data-toggle="tab">热门头条</a></li>
	              </ul>
	              <div class="tab-content">
	                <div class="tab-pane active" id="lA">
	                	@forelse($basic_articles as $article)
					    <div class="thumbnail">
					      <img src="{{ $article->page_image }}" alt="{{ $article->title }}">
					      <div class="caption">
					        <h3>{{ str_limit($article->title,25) }}</h3>
					        <p><a href="{{ url($article->slug) }}.html" class="btn btn-primary" role="button">Read Me</a> </p>
					      </div>
					    </div>
					    @empty
			                <h3 class="text-center">{{ lang('Nothing') }}</h3>
			            @endforelse
	                </div>
	                <div class="tab-pane" id="lB">
	                  	@forelse($tech_articles as $article)
					    <div class="thumbnail">
					      <img src="{{ $article->page_image }}" alt="{{ $article->title }}">
					      <div class="caption">
					        <h3>{{ str_limit($article->title,25) }}</h3>
					        <p><a href="{{ url($article->slug) }}.html" class="btn btn-primary" role="button">Read Me</a> </p>
					      </div>
					    </div>
					    @empty
			                <h3 class="text-center">{{ lang('Nothing') }}</h3>
			            @endforelse
	                </div>
	                <div class="tab-pane " id="lC">
	                  	@forelse($hot_articles as $article)
					    <div class="thumbnail">
					      <img src="{{ $article->page_image }}" alt="{{ $article->title }}">
					      <div class="caption">
					        <h3>{{ str_limit($article->title,25) }}</h3>
					        <p><a href="{{ url($article->slug) }}.html" class="btn btn-primary" role="button">Read Me</a> </p>
					      </div>
					    </div>
					    @empty
			                <h3 class="text-center">{{ lang('Nothing') }}</h3>
			            @endforelse
	                </div>
	              </div>
	            </div>

				

				
				  	
				  	
					

				
            </div>
           
        </div>
    </div>
    
    <!-- 轮播end -->
</div>