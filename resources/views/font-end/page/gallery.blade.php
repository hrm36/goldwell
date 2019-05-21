@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<a href="{{route('contact')}}">GALLERY</a>
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>GALLERY</h1>
			<p class="bodytext">Các bộ sưu tập mới nhất!.</p>
		</div>
		<div class="list-page-gallery">
		@if ($cls != null)
            @foreach($cls as $cl)
                @include('font-end.partials.item-gallery2', ['collection' => $cl]) 
            @endforeach
        @endif

		</div>
		{{ $cls->links() }}
	</div>

</section>


@endsection