@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<a href="{{route('gallery-font-end')}}">GALLERY</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				{{$cl->name}}
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>{{$cl->name}}</h1>
		</div>
		<div class="list-page-gallery">
			@if ($cl != null)
			@foreach($cl->media()->get() as $media)
			@if($media->type == 1)
			<div class="item-gl col-md-4 col-sm-6 col-xs-6">
				<a data-fancybox="gallery" href="{{$media->image}}"><img src="{{$media->image}}" class="img-gallery"></a>	
			</div>
			@endif               
			@endforeach
			@endif
		</div>
		{{ $cl->media()->paginate(9)->links()}}
	</div>

</section>


@endsection
@section('script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
@stop