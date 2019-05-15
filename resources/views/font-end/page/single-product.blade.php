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
			<h1>SYSTEM</h1>
			<h4 style="font-weight: bold;text-align: center;">MULTIPLY YOUR COLOR OPPORTUNITIES.</h4>
		</div>
		<div class="image-intro">
			<img src="https://www.goldwell.us/fileadmin/_processed_/7/f/csm_products_categories_topteaser_a2a9e3e25e.jpg">
		</div>
		<div class="list-content">	
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<h2>BENEFITS</h2>
					<div class="content">	
						<p class="bodytext">• Unlimited freedom to fuel your <b>creativity</b>
						</p>
						<p class="bodytext">• Individual color services, <b>customized </b>to fulfill your clients’ wishes
						</p>
						<p class="bodytext">• High-performing integrated system to build your <b>confidence </b>for all your color services </p>
					</div>
				</div>
			</div>
			<div class="divider">
				<div class="reddot">
				</div>
			</div>
			<div class="row text">
				<div class="col-md-12">
					<h2>BENEFITS</h2>
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
					<h2>RELATED PRODUCTS</h2>
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