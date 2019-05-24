
@extends('admin.layouts.default')

@section('css')
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Tạo mới bộ sưu tập</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('coll.index')}}">Danh sách bộ sưu tập</a>
			</li>
			<li class="active">
				<strong>Tạo mới bộ sưu tập</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('coll.index')}}" class="btn btn-primary">Danh sách</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content ">
	<div class="row animated fadeInRight">		
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin bộ sưu tập</h5>
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
				<form class="form-horizontal" role="form" action="{{route('coll.store')}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				<!--Panel -->
				<div class="panel-panel-default">
					<div id="info" class="panel-collapse-collapse">
						<div class="panel-body-c">
							<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Ảnh(*)</label>
								<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-btn">
											<a href="{{env("URL_FILEMANAGE_1", "")}}"
											class="btn btn-primary red iframe-btn" id="iframe-create-coll"><i
											class="fa fa-picture-o"></i>Chọn ảnh</a>
										</span>
										<input id="thumb_0" class="form-control" type="text" required>
									</div>
									<div id="preview">

									</div>
								</div>
							</div>
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Tên bộ sưu tập (*) </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
								</div>
							</div>

							<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Slug (*) </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}">
								</div>
							</div>

							<div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Thời gian (*) </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="time" id="time" value="{{old('time')}}">
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
<script src="{{asset('assets/js/hrm.js')}}"></script>
<script type="text/javascript">
settingIframe("#iframe-create-coll");	
</script>
@stop