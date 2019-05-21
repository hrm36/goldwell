@extends('admin.layouts.default')

@section('title')
Sửa thông tin liên hệ
@parent
@stop

@section('css')
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Sửa thông tin liên hệ: {{$contact->name}}</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a>Danh sách liên hệ</a>
			</li>
		</ol>
	</div>
	<div class="error-log" style="float: left; width: 100%;">
		@if(count($errors) > 0)
		<div class="alert alert-danger" style="margin-top: 20px;">
			@foreach($errors->all() as $err)
			<strong>{{ $err }}</strong><br/>                          
			@endforeach
		</div>
		@endif
		@if($thongbao != null && $thongbao != '')
		<div class="alert alert-success" style="margin-top: 20px;">
			{{$thongbao}}
		</div>
		@endif
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form action="{{$contact->id}}" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group"><label class="col-sm-2 control-label">Danh xưng</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="sex" id="sex" value="{{$contact->sex}}"></div>
						</div>
						<div class="hr-line-dashed"></div>

						<div class="form-group"><label class="col-sm-2 control-label">Tên đầy đủ</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="fullname" id="fullname" value="{{$contact->fullname}}"></div>
						</div>

						<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" value="{{$contact->email}}"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="phone" id="phone" value="{{$contact->phone}}"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Số đường</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="street" id="street" value="{{$contact->street}}"></div>
						</div>
						<div class="hr-line-dashed"></div>	 
						<div class="form-group"><label class="col-sm-2 control-label">Thành phố</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="city" id="city" value="{{$contact->city}}"></div>
						</div>

						<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Nội dung</label>
							<div class="col-sm-10"><input type="text" class="form-control" name="content" id="content" value="{{$contact->content}}"></div>
						</div>

						<div class="hr-line-dashed"></div>
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
	<div class="wrapper wrapper-content">
	</div>
	@stop
	@section('script')

	<!-- iCheck -->
	<script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>

	<!-- Peity -->
	<script src="{{asset('assets/js/demo/peity-demo.js')}}"></script>


	@stop
