@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/fancybox/source/jquery.fancybox.css')}}">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thêm mới quy trình hoặc công nghệ sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('extra.index')}}">Danh sách quy trinh & công nghệ</a>
			</li>
			<li class="active">
				<strong>Thêm mới quy trình hoặc công nghệ sản phẩm</strong>
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
				<h5>Thông tin</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<strong>{{$err}}</strong><br>
					@endforeach
				</div>
				@endif

				@if(session('error'))
				<div class="alert alert-danger">
					<strong>{{session('error')}}</strong>
				</div>
				@endif
				@if(session('success'))
				<div class="alert alert-success">
					<strong>{{session('success')}}</strong>
				</div>
				@endif
				<form class="form-horizontal" role="form" action="{{route('extra.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				<div class="form-group">
					<label class="col-sm-2 control-label">Loại thông tin </label>
					<div class="col-md-4">
						<select class="form-control m-b" name="type" id="type">
							<option value = "0">Quy trình</option>
							<option value = "1">Công nghệ</option>								
						</select>                                       
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Danh mục </label>
					<div class="col-md-4">
						<select class="form-control m-b" name="cat_id" id="cat_id" onchange="catChange(this)">
							<option value="all" selected>Tất cả</option>
							@foreach ($cats as $cat): ?>
							<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
						</select>                                       
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sản phẩm (*)</label>
					<div class="col-md-4 product-list">
						@include('admin.partials.product-select')                                 
					</div>
				</div>
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
				<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Nội dung (*) </label>
					<div class="col-sm-10">
						<textarea name="content" id="content" class="form-control my-editor" rows="20" required>
						</textarea>
					</div>
				</div>
				<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Trạng thái</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="status" id="status">
							<option value = "1">Sử dụng</option>
							<option value = "0">Không sử dụng</option>								
						</select>                                       
					</div>
				</div>
				<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type ="reset">Làm mới</button>
						<button class="btn btn-primary" type="submit">Tạo mới</button>
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
<!-- slick carousel-->
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/hrm.js')}}"></script>
<script>
	
	$(document).ready(function()
	{
		CKEDITOR.replace( 'content' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});
	});
	function catChange(obj)
	{
		$.ajax(
		{
			url: '?&cat_id=' + obj.value, 
			type: "get",
			datatype: "html"
		}).done(function(data){
			$(".product-list").empty().html(data);
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			alert('No response from server');
		});
	}
	settingIframe("#iframe-create-ext");
</script>

@stop