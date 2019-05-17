@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="/">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{{$b['title']}}</h1>
			<p class="bodytext">{!! $b['content'] !!}</p>
		</div>
		<div class="list-post">	
			@include("font-end.partials.item-news")
			@include("font-end.partials.item-news")
			@include("font-end.partials.item-news")
			@include("font-end.partials.item-news")
			@include("font-end.partials.item-news")
		</div>
	</div>
</section>


@endsection