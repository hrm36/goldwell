@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>{{$_label}}
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{{$info['title']}}</h1>
			<p class="bodytext">{!! $info['content'] !!}</p>
		</div>
		<div class="image-intro">
			<img src="{{$info['image']}}">
		</div>
		<div class="list-post">
		@foreach($list as $l)
			@include("font-end.partials.item", ['data'=>$l, 'name_route' => $name_route])
		@endforeach 
		</div>
	</div>
</section>
@endsection