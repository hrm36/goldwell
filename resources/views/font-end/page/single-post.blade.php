@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<a href="{{$_link}}">{{$_title}}</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>{{$_post->name}}
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{{$_post->name}}</h1>
		</div>
		<div class="image-intro" style="margin-bottom: 25px;">
			<img src="{{$_post->image}}">
		</div>
		<div class="list-content">	
			<p class ="bodytext" >{!! $_post->des_f !!} </p>
		</div>
	</div>
</section>
@endsection