@inject('news', 'App\Content')
<div class="subbanner">
<h1>Мэдээ мэдээлэл</h1>
	<div class="news_section row">
		<section class="col-md-6">
			<!-- 16:9 aspect ratio -->
			<div class="embed-responsive embed-responsive-16by9">
<iframe width="560" height="315" src="https://www.youtube.com/embed/F0L3ccoYlfs" frameborder="0" allowfullscreen></iframe>
			</div>
		</section>
		<section class="col-md-6" style="height:100%;">
			@foreach($news->getLatestNews() as $anews)
                <article class="col-md-6 col-sm-6">
                    <a href="{{ route('news_show_path', $anews->id) }}" >{!! Html::image("assets/news/thumbs/$anews->photo", null, ['class'=>'width100']) !!}</a>
                    <figcaption>
                        <h5>{!! link_to_route('news_show_path', $anews->title, $anews->id)!!}</h5>
                    </figcaption>
                </article>
			@endforeach		
		</section>
	</div>
	
</div>
<div class="placeholder100"></div>