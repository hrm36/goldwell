@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="/">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>NEWS & EVENTS
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>IT’S WAY BEYOND PRODUCTS</h1>
			<p class="bodytext">We think stylist.&nbsp;<br>So we know that only a stylist-exclusive brand that meets all your professional needs can help you reach your goals.<br>A full portfolio for stunning results. Innovative tools for superior agility. Technical advances that streamline your work.<br>Service concepts that make your clients happy.</p>
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