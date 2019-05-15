@extends('admin.layouts.default')

@section('title')
Thư viện ảnh
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Thư viện</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a>Thư viện</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="wrapper wrapper-content">
	<iframe src="{{url('../filemanager/dialog.php?type=0&field_id=thumb_0')}}" style="width: 100%; height: 800px; overflow: hidden; border: none;"></iframe>
</div>
@stop
