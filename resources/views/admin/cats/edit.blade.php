@extends('admin.layouts.default')

@section('css')

@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Sửa chuyên mục mục sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-dm')}}">Tất cả danh mục sản phẩm</a>
			</li>
			<li class="active">
				<strong>Sửa chuyên mục sản phẩm</strong>
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
				<h5>Thông tin chuyên mục: {{$cat->name}}</h5>
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
				<form class="form-horizontal" role="form" action="{{route('update-dm',['id'=>$cat->id])}}" 
					enctype="multipart/form-data" method="POST">
					@csrf
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Tên chuyên mục</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="name" id="name" value="{{$cat->name}}" required>                              
						</div>
					</div>
					<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Slug</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="slug" id="slug" value="{{$cat->name}}" required>                                
						</div>
					</div>
					<div class="form-group {{ $errors->has('cat_id') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Chuyên mục cha</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="cat_id" id="cat_id" required>
								<option value="">Chọn chuyên mục</option>
								@foreach($catlist as $p)
								<option value="{{$p->id}}" {{ $cat->cat_id == $p->id ? "selected" : "" }}>{{$p->name}}</option>
								@endforeach
							</select>                                       
						</div>
					</div>
					<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Loại chuyên mục</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="type" id="type" required>
								<option value="0" {{ $cat->type == 0 ? "selected" : "" }}>Có chuyên mục con</option>
								<option value="1" {{ $cat->type == 1 ? "selected" : "" }}>Không có chuyên mục con</option>
							</select>                                       
						</div>
					</div>

					<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Banner (*)</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-btn">
									<a href="{{env("URL_FILEMANAGE_1", "")}}"
									class="btn btn-primary red iframe-btn" id="iframe-edit-cat"><i
									class="fa fa-picture-o"></i>Chọn ảnh</a>
								</span>
								<input id="thumb_0" value="{{$cat->image}}" class="form-control" type="text" name="image" required>
							</div>
							<div id="preview">
								<div class="img_preview"><img src="{{$cat->image}}"/></div>
							</div>
						</div>
					</div>

					<div class="form-group {{ $errors->has('des') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Miêu tả ngắn (*) </label>
						<div class="col-sm-10">
							<textarea name="des_s" id="des_s" class="form-control my-editor" rows="20" required>
								{{$cat->des_s}}
							</textarea>
						</div>
					</div>
					<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Trạng thái</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="status" id="status" required>
								<option value="1" {{ $cat->status == 1 ? "selected" : "" }}>Đã đăng</option>
								<option value="0" {{ $cat->status == 0 ? "selected" : "" }}>Chờ duyệt</option>
							</select>                                       
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" type ="reset">Làm mới</button>
							<button class="btn btn-primary" type="submit">Cập nhật</button>
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
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/hrm.js')}}"></script>
<script>
	$(document).ready(function()
	{
		settingIframe("#iframe-edit-cat");
		CKEDITOR.replace( 'des_s' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});

	});
	
</script>
@stop