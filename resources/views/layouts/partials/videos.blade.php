<article style="margin:45px 20px;">
<h3><i class="fa fa-video-camera"></i> Videos</h3>
    <div class="row">
    @if($videos)
        @foreach($videos as $index => $video)
        <div class="col-sm-6 col-md-4 noPadding">
            <div class="thumbnail thumb{{ $index }}">
                <h3>{{ $video->title }}</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{$video->video . "?rel=0&amp;showinfo=0"}}" allowfullscreen></iframe>
                </div>

                <div class="caption">

                    <p>{{ $video->shorten(100) }}</p>

                </div>
            </div>
        </div>
        @endforeach()
    @endif
    </div>
</article>