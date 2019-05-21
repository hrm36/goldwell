<div class="item-gl col-md-4 col-sm-6 col-xs-6">
	<div class="item-gl-inner">
		<a href="{{route('show-gallery',['slug' => $collection->slug])}}">
			<img src="{{$collection->media()->first()->image}}" class="img-gallery">
			<div class="overlay-gl"></div>
			<div class="content-gl">
				<div class="title">
					{{$collection->name}}
				</div>
				<div class="date">
					{{$collection->time}}
				</div>
			</div>
		</a>
	</div>
</div>