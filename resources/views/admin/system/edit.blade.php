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
		<h2>Thay đổi thông tin website</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('system.index')}}">Thông tin website</a>
			</li>
			<li class="active">
				<strong>Thay đổi thông tin website</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="#" class="btn btn-primary">Trang quy trình</a>
			<a href="#" class="btn btn-primary">Trang công nghệ</a>
			<a href="#" class="btn btn-primary">Trang chuyên mục</a>
			<a href="#" class="btn btn-primary">Trang sản phẩm</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thay đổi thông tin website</h5>
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
				<form class="form-horizontal" role="form" action="{{route('system.update',['id' => 'info'])}}" 
				enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf				
				<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Logo (*)</label>
					<div class="col-sm-10">
						<div class="input-group">
							<span class="input-group-btn">
								<a href="/goldwell/filemanager/dialog.php?type=1&field_id=thumb_0"
								class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
								class="fa fa-picture-o"></i>Chọn ảnh</a>
							</span>
							<input id="thumb_0" value="{{$info['logo']}}" class="form-control" type="text" name="logo" required>
						</div>
						<div id="preview">
							<img src="{{$info['logo']}}" style="height: 300px" />
						</div>
					</div>
				</div>
				<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Link FB (*) </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="facebook" id="facebook" value="{{$info['facebook']}}">
					</div>
				</div>
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Số điện thoại (*) </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" id="phone" value="{{$info['phone']}}">
					</div>
				</div>
				<div class="form-group {{ $errors->has('open_time') ? 'has-error' : '' }}">

					<label class="col-sm-2 control-label">Thời gian mở cửa (*) </label>
					<div class="col-sm-10">
						<textarea name="open_time"  id="open_time" class="form-control my-editor" rows="20" required>
							{{$info['open_time']}}
						</textarea>
					</div>
				</div>
				<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Địa chỉ (*) </label>
					<div class="col-sm-10">
						<textarea name="address"  id="address" class="form-control my-editor" rows="20" required>
							{{$info['address']}}
						</textarea>
					</div>
				</div>
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
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	var fmPath = '/goldwell/filemanager/dialog.php?type=2&editor=ckeditor&fldr=';
	$(document).ready(function()
	{
		CKEDITOR.replace( 'open_time' ,{
			filebrowserBrowseUrl : fmPath,
			filebrowserUploadUrl : fmPath,
			filebrowserImageBrowseUrl : '/goldwell/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
		});
		CKEDITOR.replace( 'address' ,{
			filebrowserBrowseUrl : fmPath,
			filebrowserUploadUrl : fmPath,
			filebrowserImageBrowseUrl : '/goldwell/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
		});
		$('#iframe-btn-0').fancybox({
			'width': 900,
			'height': 900,
			'type': 'iframe',
			'autoScale': false,
			'autoSize': false,
			afterClose: function () {
				var thumb = $('#thumb_0').val();
				if (thumb) {
					var html = '<div class="img_preview"><img src="' + thumb + '" style="height: 300px" />';
					html += '<input type="hidden" name="logo" value="' + thumb + '" /> </div>';
					$('#preview').html(html);
				}
			}
		});

	});
</script>
@stop