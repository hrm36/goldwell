@extends('admin.layouts.default')

@section('title')
Bảng tin
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Bảng tin</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="wrapper wrapper-content">
	@include('admin.partials.dashboard')
</div>
@stop
