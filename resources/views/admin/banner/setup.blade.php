@extends('admin.layouts.default')

@section('css')
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Số lượng ảnh hiển thị trang chủ</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('banner.index')}}">Banner trang chủ</a>
			</li>
			<li class="active">
				<strong>Số lượng ảnh hiển thị trang chủ</strong>
			</li>
		</ol>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Số lượng ảnh hiển thị trang chủ</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					Thông tin chưa chính xác, bạn cần chỉnh sửa như sau:
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session('error-number-display'))
				<div class="alert alert-danger">
					<strong>{{session('error-number-display')}}</strong>
				</div>
				@endif
				@if(session('success-number-display'))
				<div class="alert alert-success">
					<strong>{{session('success-number-display')}}</strong>
				</div>
				@endif
				<form class="form-horizontal" role="form" action="{{route('save-number')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf				
				<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Số lượng</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="number" id="number" value="{{$number_display}}">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type ="reset">Làm mới</button>
						<button class="btn btn-primary" type="submit">Cập nhật</button>
					</div>
				</div>	
			</form>

		</div>
	</div>
</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
@stop