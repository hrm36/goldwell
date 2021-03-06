
@extends('admin.layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('assets/fancybox/source/jquery.fancybox.css')}}">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thay đổi media</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('media.index')}}">Danh sách media</a>
			</li>
			<li class="active">
				<strong>Thay đổi media</strong>
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
				<form class="form-horizontal" role="form" action="{{route('media.update',['id'=>$media->id])}}" 
				enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf
				<!--Panel -->
				<div class="panel-panel-default">
					<div id="info" class="panel-collapse-collapse">
						<div class="panel-body-c">
							<div class="form-group">
								<label class="col-sm-2 control-label">Loại media (*)</label>
								<div class="col-md-4">
									<select class="form-control m-b" name="type">
										<option value="1" {{$media->type == 1 ? "selected" : ""}}>Ảnh</option>
										<option value="0" {{$media->type == 0 ? "selected" : ""}}>Video</option>
									</select>                                       
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Bộ sưu tập (*)</label>
								<div class="col-md-4">
									<select class="form-control m-b" name="collection_id">
										@foreach($colls as $c)
										<option value="{{$c->id}}" 
											{{isset($media->coll) ? ($media->coll->id == $c->id ? "selected" : "") : "" }}
										>
											{{$c->name}}
										</option>
										@endforeach
									</select>                                       
								</div>
							</div>	 	 
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" value="{{$media->title}}">
								</div>
							</div>
							<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Ảnh(*)</label>
								<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-btn">
											<a href="{{env("URL_FILEMANAGE_1", "")}}"
											class="btn btn-primary red iframe-btn" id="iframe-edit-media"><i
											class="fa fa-picture-o"></i>Chọn ảnh</a>
										</span>
										<input id="thumb_0" class="form-control" type="text" name="image" value="{{$media->image}}" required>
									</div>
									<div id="preview" style="display: block;margin-bottom: 20px">
										<div class="img_preview"><img src="{{$media->image}}"/>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
								<label class="col-sm-2 control-label">Link </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="link" id="link" value="{{$media->link}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Trạng thái (*)</label>
								<div class="col-md-4">
									<select class="form-control m-b" name="status" id="status">
										<option value = "1" {{$media->status == 1 ? 'selected' : ''}}>Sử dụng</option>
										<option value = "0" {{$media->status == 0 ? 'selected' : ''}}>Không sử dụng</option>								
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
						<button class="btn btn-primary" type="submit">Cập nhật</button>
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
<script type="text/javascript">
settingIframe("#iframe-edit-media");	
</script>
@stop