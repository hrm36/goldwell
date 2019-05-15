@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
        <h2>Thêm mới quy trình sản phẩm</h2>
        <ol class="breadcrumb">
	        <li>
	            <a href="{{route('dashboard')}}">Home</a>
	        </li>
	        <li>
	            <a href="#">Danh sách sản phẩm</a>
	        </li>
	        <li class="active">
	            <strong>Thêm mới quy trình sản phẩm</strong>
	        </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
        	<a href="#" class="btn btn-primary">Trang danh sách quy trình</a>
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
	            <h5>Thông tin quy trình</h5>
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
				 @if (isset($message))
					 <div class="alert alert-success">
					 	{{ $message }}
					 </div>
				 @endif
				 <form class="form-horizontal" role="form" action="#" 
				 enctype="multipart/form-data" method="POST">
				 @csrf
				 	<div class="form-group">
						<label class="col-sm-2 control-label">Danh mục </label>
						<div class="col-md-4">
							<select class="form-control m-b" name="cat">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
							</select>                                       
						</div>
					</div>
				 	<div class="form-group">
						<label class="col-sm-2 control-label">Sản phẩm (*)</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="account">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
							</select>                                       
						</div>
					</div>
					<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					 	<label class="col-sm-2 control-label">Ảnh (*)</label>
					 	<div class="col-sm-10">
					 		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
					 			<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
					 				<span class="fileinput-filename"></span>
					 			</div>
					 			<span class="input-group-addon btn btn-default btn-file">
					 				<span class="fileinput-new">Chọn ảnh</span>
					 				<span class="fileinput-exists">Thay đổi</span>
					 				<input type="file" name="image">
					 			</span>
					 			<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a>
					 		</div>						
					 	</div>
					</div>
					<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Nội dung (*) </label>
							<div class="col-sm-10">
								<textarea name="content" id="content" class="form-control my-editor" rows="20" required>
								</textarea>
							</div>
					</div>
					<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" >Làm mới</button>
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
<script type="text/javascript">
	$(document).ready(function()
	{
		CKEDITOR.replace( 'content' ,{
			filebrowserBrowseUrl : fmPath,
			filebrowserUploadUrl : fmPath,
			filebrowserImageBrowseUrl : '/goldwell/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
		});
	});
</script>

@stop