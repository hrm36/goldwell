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
		<h2>Thay đổi thông tin trang tin tức</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('page-news')}}">Thông tin trang tin tức</a>
			</li>
			<li class="active">
				<strong>Thay đổi thông tin trang tin tức</strong>
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
				<h5>Thông tin trang tin tức</h5>
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
				@if (isset($message))
				<div class="alert alert-success">
					{{ $message }}
				</div>
				@endif
				<form class="form-horizontal" role="form" action="{{route('page-news-ed')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Tiêu đề (*) </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" id="title" value="{{$info['title']}}">
					</div>
				</div>
				<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Ảnh (*)</label>
					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-btn">
								<a href="{{env("URL_FILEMANAGE_1", "")}}"
								class="btn btn-primary red iframe-btn" id="iframe-edit-info-new"><i
								class="fa fa-picture-o"></i>Chọn ảnh</a>
							</span>
							<input id="thumb_0" value="{{$info['image']}}" class="form-control" type="text" name="image" required>
						</div>
						<div id="preview">
							<img src="{{$info['image']}}" style="height: 300px" />
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('content_sp_info') ? 'has-error' : '' }}">

					<label class="col-sm-2 control-label">Nội dung (*) </label>
					<div class="col-sm-10">
						<textarea name="content_sp_info"  id="content" class="form-control my-editor" rows="20" required>
							{{$info['content']}}
						</textarea>
					</div>
				</div>
				<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type ="reset">Reset</button>
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
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		CKEDITOR.replace( 'content_sp_info' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});
		settingIframe("#iframe-edit-info-new");
	});
</script>
@stop