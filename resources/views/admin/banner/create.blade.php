@extends('admin.layouts.default')

@section('css')

@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thêm mới banner trang chủ</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('banner.index')}}">Banner trang chủ</a>
			</li>
			<li class="active">
				<strong>Thêm mới banner trang chủ</strong>
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
				<h5>Thêm mới banner trang chủ</h5>
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
				@if(session('error-banner'))
				<div class="alert alert-danger">
					<strong>{{session('error-banner')}}</strong>
				</div>
				@endif
				@if(session('success-banner'))
				<div class="alert alert-success">
					<strong>{{session('success-banner')}}</strong>
				</div>
				@endif
				<form class="form-horizontal" role="form" action="{{route('banner.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf				
				<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Ảnh (*)</label>
					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-btn">
								<a href="{{env("URL_FILEMANAGE_1", "")}}"
								class="btn btn-primary red iframe-btn" id="iframe-create-ext"><i
								class="fa fa-picture-o"></i>Chọn ảnh</a>
							</span>
							<input id="thumb_0" class="form-control" type="text" name="image" required>
						</div>
						<div id="preview">

						</div>
					</div>
				</div>
				<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Text</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="text" id="text" value="{{old('text')}}">
					</div>
				</div>
				<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Link</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
					</div>
				</div>
				<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Loại banner</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="type" id="type" required>
							<option value="1">Slide top trang chủ</option>
							<option value="2">Bộ sưu tập</option>
						</select>                                       
					</div>
				</div>
				
				<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Trạng thái</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="status" id="status" required>
							<option value="1">Sử dụng</option>
							<option value="0">Tạm dừng</option>
						</select>                                       
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type ="reset">Làm mới</button>
						<button class="btn btn-primary" type="submit">Thêm mới</button>
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
<script>	
	settingIframe("#iframe-create-ext");
</script>
@stop