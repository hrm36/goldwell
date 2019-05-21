@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="/">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<a href="/">PRODUCTS</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>SYSTEM RANGE
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{!! $_post->name !!}</h1>
			<p class="bodytext">{!! $_post->des_s !!}</p>
		</div>
		<div class="image-intro">
			<img src="{{$_post->image}}">
		</div>
		<div class="divider">
			<div class="reddot"></div>
		</div>
		<div class="list-content">	
			<div class="row text">
				<div class="col-md-12">
					<h2>NỘI DUNG</h2>
					<div class="content">	
						<p class="bodytext">{!! $_post->des_f !!}
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
						@if($_post->extra != null)
							@foreach($_post->extra as $_xt)
								@if($_xt->type == 0)
									@include("font-end.partials.item-quytrinh", ['item' =>$_xt])
								@endif
							@endforeach
						@endif
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
								@include("font-end.partials.slider-product")
								@include("font-end.partials.slider-product")
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
						@include("font-end.partials.item-related")
						@include("font-end.partials.item-related")
						@include("font-end.partials.item-related")
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection