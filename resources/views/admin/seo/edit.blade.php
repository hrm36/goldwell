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
		<h2>SEO website</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('system.index')}}">SEO</a>
			</li>
			<li class="active">
				<strong>Thay đổi nội dung SEO</strong>
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
				<h5>Thay đổi nội dung SEO</h5>
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
				<form class="form-horizontal" role="form" action="{{route('seo.update',['id' => 'info'])}}" 
				enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf				
				<div class="form-group {{ $errors->has('meta') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Thẻ meta (head)</label>
					<div class="col-sm-10">
						<textarea name="meta"  id="meta" class="form-control my-editor" rows="20" required>
							{{$info['meta']}}
						</textarea>
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
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		CKEDITOR.replace( 'meta' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});
	});
</script>
@stop