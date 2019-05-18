<div class="textpic default">
	<div class="col-md-6 ct">
		<div class="trai">	
			<div class="gfx-wrap swiper-desktop">	
				<div class="imgswiper">
					<img class="vis_0" src="{{$data->image}}" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 cp">
		<div class="text phai">	
			<h2>{{$data->name}}</h2>
			<p class="bodytext">{!! $data->des_s !!}
			</p>
			<p class="bodytext"><a href="{{route($name_route, ['slug' => $data->slug])}}" title="STYLING" class="button-black-whitehover">Read More</a></p>
		</div>
	</div>
</div>