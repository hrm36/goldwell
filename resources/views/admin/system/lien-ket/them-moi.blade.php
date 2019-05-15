@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thêm mới trang liên kết</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('danh-sach-lien-ket')}}">Danh sách trang liên kết</a>
			</li>
			<li class="active">
				<strong>Thêm trang liên kết mới</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('danh-sach-lien-ket')}}" class="btn btn-primary">Trở về</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin trang liên kết</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<!-- FORM -->
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
				@if (isset($message))
				<div class="alert alert-success">
					{{ $message }}
				</div>
				@endif
				<form class="form-horizontal" role="form" action="#" 
				enctype="multipart/form-data" method="POST">
				@csrf
				<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Logo</label>
					<div class="col-sm-10">
						<div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
								<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Chọn ảnh</span>
								<span class="fileinput-exists">Thay đổi</span>
								<input type="file" name="logo">
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a>
						</div>						
					</div>
				</div>	                
				<div class="hr-line-dashed"></div>

				<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
					<label class="col-sm-2 control-label">Tên themes </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
					</div>
				</div>
				<div class="hr-line-dashed"></div>

				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" >Làm mới</button>
						<button class="btn btn-primary" type="submit">Tạo mới</button>
					</div>
				</div>	  
			</form>
			<!-- END FORM -->

		</div>
	</div>
</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
@stop