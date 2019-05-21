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
		<h2>Tạo mới danh mục sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-dm')}}">Tất cả danh mục sản phẩm</a>
			</li>
			<li class="active">
				<strong>Tạo mới danh mục sản phẩm</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('create-dm')}}" class="btn btn-primary">Thêm mới</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin danh mục</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					Thông tin tạo mới chưa chính xác, bạn cần chỉnh sửa như sau:
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session('thongbao'))
				<div class="alert alert-success">
					<strong>{{session('thongbao')}}</strong>
				</div>
				@endif
				<form class="form-horizontal" role="form" action="{{route('create-dm')}}" 
				enctype="multipart/form-data" method="POST">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Tên chuyên mục</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>                        
					</div>
				</div>
				<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Slug</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}" required>                                
					</div>
				</div>
				<div class="form-group {{ $errors->has('cat_id') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Chuyên mục cha</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="cat_id" id="cat_id">
							<option value="">Chọn chuyên mục</option>
							@foreach($cat as $p)
							<option value="{{$p->id}}">{{$p->name}}</option>
							@endforeach
						</select>                                       
					</div>
				</div>
				<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Loại chuyên mục</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="type" id="type" required>
							<option value="0">Có chuyên mục con</option>
							<option value="1">Không có chuyên mục con</option>
						</select>                                       
					</div>
				</div>
				<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Image (*)</label>
					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-btn">
								<a href="{{env("URL_FILEMANAGE_1", "")}}"
								class="btn btn-primary red iframe-btn" id="iframe-create-cat"><i
								class="fa fa-picture-o"></i>Chọn ảnh</a>
							</span>
							<input id="thumb_0" class="form-control" type="text" name="image" required>
						</div>
						<div id="preview" style="display: block;margin-bottom: 20px">

						</div>
					</div>
				</div>
				<div class="form-group {{ $errors->has('des') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Miêu tả ngắn (*) </label>
					<div class="col-sm-10">
						<textarea name="des_s" id="des_s" class="form-control my-editor" rows="20" required>

						</textarea>
					</div>
				</div>
				<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Trạng thái</label>
					<div class="col-md-4">
						<select class="form-control m-b" name="status" id="status" required>
							<option value="1">Đã đăng</option>
							<option value="0">Chờ duyệt</option>
						</select>                                       
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type ="reset">Làm mới</button>
						<button class="btn btn-primary" type="submit">Tạo mới</button>
					</div>
				</div>	
				@csrf
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
		
		CKEDITOR.replace( 'des_s' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});

		settingIframe("#iframe-create-cat");
	});
</script>
@stop