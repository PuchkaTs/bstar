@inject('news', 'App\Content')
<div class="subbanner">
<h1>Мэдээлэл & Зөвлөгөө </h1>
	<div class="news_section row">

		<section class="col-md-12" style="height:100%;">
			@foreach($news->getLatestNews() as $anews)
				@if($news->getLatestId() == $anews->id)
				<div class="row">
					<div class="col-md-6">
	                <article style="margin-top:0px; min-height:295px;">
	                    <a href="{{ route('news_show_path', $anews->id) }}" >{!! Html::image("assets/news/thumbs/$anews->photo", null, ['class'=>'width100']) !!}</a>
	                    <figcaption>
	                        <h5>{!! link_to_route('news_show_path', $anews->shortenTitle(), $anews->id)!!}</h5>
	                    </figcaption>
	                </article>
	                </div>
					<section class="col-md-6">
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/uXATjvr_rl4" frameborder="0" allowfullscreen></iframe>
						</div>
					</section>  
				</div>              
				@else
				<div class="col-md-3 col-sm-6">
	                <article>
		                    <a href="{{ route('news_show_path', $anews->id) }}" >{!! Html::image("assets/news/thumbs/$anews->photo", null, ['class'=>'width100']) !!}</a>
		                    <figcaption class="height60">
		                        <h5>{!! link_to_route('news_show_path', $anews->shortenTitle(70), $anews->id)!!}</h5>
		                    </figcaption>
	                </article>
                </div>
                @endif
			@endforeach		
		</section>
		
	</div>
</div>
<div class="placeholder100"></div>