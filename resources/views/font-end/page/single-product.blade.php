@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<a href="{{route('categories')}}">PRODUCTS</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>{{$_post->name}}
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{!! $_post->name !!}</h1>
			<h4 style="font-weight: bold;text-align: center;">{!! $_post->des_s !!}</h4>
		</div>
		<div class="image-intro">
			<img src="{{$_post->image}}">
		</div>
		<div class="list-content">	
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<div class="content">
					<p class="bodytext">	
						{!! $_post->des_f !!}
					</p>
					</div>
				</div>
			</div>
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<h2>QUY TRÌNH</h2>
					<div class="content">	
						<div class="product-slides clear clearfix">
							<ul class="product-slide">
								@if($_post->extra != null)
									@foreach($_post->extra as $_xt)
										@if($_xt->type == 0)
											@include("font-end.partials.slider-product", ['item' =>$_xt])
										@endif
									@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<h2>CÔNG NGHỆ</h2>
					<div class="content">	
						<div class="product-slides clear clearfix">
							<ul class="product-slide">
								@if($_post->extra != null)
									@foreach($_post->extra as $_xt)
										@if($_xt->type == 1)
											@include("font-end.partials.slider-product", ['item' =>$_xt])
										@endif
									@endforeach
								@endif					
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<h2>SẢN PHẨM LIÊN QUAN</h2>
					<div class="content">
						@if(isset($cat))
							@foreach($cat->product as $product)
							@include("font-end.partials.item-related",['product' => $product])
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection