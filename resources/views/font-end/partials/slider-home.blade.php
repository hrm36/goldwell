<div class="home-slider">
	<div class="home-slides clear clearfix">
		<ul class="home-slide">
			@if($sls->count() > 0)
				@foreach($sls as $sl)
				<li class="slide-it">
					<a href="{{$sl->link}}">
						<img src="{{$sl->image}}" alt="" class="init">
						<div class="slide-content-wrap black">
							<div class="description">
								<span>{{$sl->text}}</span>
								<br>
							</div>
							<div class="title">
								<span>XEM THÊM</span>
							</div>
						</div>
					</a>
				</li>
				@endforeach
			@endif
		</ul>
	</div>
</div>