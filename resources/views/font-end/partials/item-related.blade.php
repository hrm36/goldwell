<div class="textpic default">
	<div class="col-md-6 ct">
		<div class="trai">	
			<div class="gfx-wrap swiper-desktop">	
				<div class="imgswiper">
					<img class="vis_0" src="{{$product->image}}" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 cp">
		<div class="text phai">	
			<h2>{{$product->name}}</h2>
			<p class="bodytext">{!! $product->des_s !!}
			</p>
			<p class="bodytext"><a href="{{route('show-product',['slug'=>$product->slug])}}" title="STYLING" class="button-black-whitehover">More Info</a></p>
		</div>
	</div>
</div>