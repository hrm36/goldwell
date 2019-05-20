
@extends('admin.layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('assets/fancybox/source/jquery.fancybox.css')}}">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Tạo mới media</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('media.index')}}">Danh sách media</a>
			</li>
			<li class="active">
				<strong>Tạo mới media</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('media.index')}}" class="btn btn-primary">Danh sách</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content ">
	<div class="row animated fadeInRight">		
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin media</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			{{-- START FORM --}}
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
				<form class="form-horizontal" role="form" action="{{route('media.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				@csrf
				<!--Panel -->
				<div class="panel-panel-default">
					<div id="info" class="panel-collapse-collapse">
						<div class="panel-body-c">
							<div class="form-group">
								<label class="col-sm-2 control-label">Loại media (*)</label>
								<div class="col-md-4">
									<select class="form-control m-b" name="type">
										<option value="1">Ảnh</option>
										<option value="0">Video</option>
									</select>                                       
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Bộ sưu tập (*)</label>
								<div class="col-md-4">
									<select class="form-control m-b" name="collection_id">
										@foreach($colls as $c)
											<option value="{{$c->id}}">{{$c->name}}</option>
										@endforeach
									</select>                                       
								</div>
							</div>	 	 
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
								</div>
							</div>
							<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Ảnh(*)</label>
								<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-btn">
											<a href="/goldwell/filemanager/dialog.php?type=1&field_id=thumb_0"
											class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
											class="fa fa-picture-o"></i>Chọn ảnh</a>
										</span>
										<input id="thumb_0" class="form-control" type="text" name="image" required>
									</div>
									<div id="preview">

									</div>
								</div>
							</div>

							<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Link </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Trạng thái (*)</label>

								<div class="col-md-4">
									<select class="form-control m-b" name="status">
										<option value="1">Công khai</option>
										<option value="0">Không công khai</option>
									</select>                                       
								</div>
							</div>	 	                            	
						</div>
					</div>
				</div>
				<!-- -->
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" type="reset" >Làm mới</button>
						<button class="btn btn-primary" type="submit">Tạo mới</button>
					</div>
				</div>					  				
			</form>
		</div>
		{{-- END FORM --}}
	</div>
</div>
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
var fmPath = '/goldwell/filemanager/dialog.php?type=2&editor=ckeditor&fldr=';

$(document).ready(function()
{
	$('#iframe-btn-0').fancybox({
		'width': 900,
		'height': 900,
		'type': 'iframe',
		'autoScale': false,
		'autoSize': false,
		afterClose: function () {
			var thumb = $('#thumb_0').val();
			if (thumb) {
				var html = '<div class="img_preview"><img src="' + thumb + '"/>';
				html += '<input type="hidden" name="image" value="' + thumb + '" /> </div>';
				$('#preview').html(html);
			}
		}
	});
});
</script>
@stop