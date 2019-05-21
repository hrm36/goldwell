@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				VIDEO
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>VIDEO</h1>
			<p class="bodytext">Video về chúng tôi.</p>
		</div>
		  <div class="video-home">
       <div class="list-video-post">
        <ul id="lightSlider" class="vertical">
          @if ($videoos != null)
            @foreach($videoos as $video)
              @include("font-end.partials.item-video", ['vi' => $video])
            @endforeach
          @endif
       </ul>
   </div>
</div>
	</div>
</section>


@endsection