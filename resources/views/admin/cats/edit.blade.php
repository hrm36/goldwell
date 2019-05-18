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
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Tên chuyên mục</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="name" id="name" value="{{$cat->name}}" required>                              
						</div>
					</div>
					<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Slug</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}" required>                                
						</div>
					</div>
					<div class="form-group {{ $errors->has('cat_id') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Chuyên mục cha</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="cat_id" id="cat_id" required>
								<option value="">Chọn chuyên mục</option>
								@foreach($catlist as $p)
									<option value="{{$p->id}}">{{$p->name}}</option>
								@endforeach
							</select>                                       
						</div>
					</div>
					<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Loại chuyên mục</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="type" id="type" required>
								<option value="0">Có chuyên mục con</option>
								<option value="1">Không có chuyên mục con</option>
							</select>                                       
						</div>
					</div>
					<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						<label class="col-sm-2 control-label">Trạng thái</label>
						<div class="col-md-4">
							<select class="form-control m-b" name="status" id="status" required>
								<option value="1">Đã đăng</option>
								<option value="0">Chờ duyệt</option>
							</select>                                       
						</div>
					</div>
					<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-primary" type="submit">Tạo mới</button>
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
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/hrm.js')}}"></script>
<script>
var fmPath = '/goldwell/filemanager/dialog.php?type=2&editor=ckeditor&fldr=';

$(document).ready(function()
{
	$(".choose-style").on('click', function() {
		  //  ret = DetailsView.GetProject($(this).attr("#data-id"), OnComplete, OnTimeOut, OnError);
		  style = $(this).attr("data-style");
		  $(".choose-style").each(function( index ) {
		  	$( this ).removeClass("btn-success");
		  	$( this ).removeClass("btn-white");
		  	$( this ).addClass("btn-white");
		  });
		  $( this ).removeClass("btn-white");
		  $( this ).addClass("btn-success");
		  $("#dis_type").val(style);
		});
	CKEDITOR.replace( 'des_f' ,{
		filebrowserBrowseUrl : fmPath,
		filebrowserUploadUrl : fmPath,
		filebrowserImageBrowseUrl : '/goldwell/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
	});

	CKEDITOR.replace( 'des_s' ,{
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
				var html = '<div class="img_preview"><img src="' + thumb + '"/>';
				html += '<input type="hidden" name="image" value="' + thumb + '" /> </div>';
				$('#preview').html(html);
			}
		}
	});

	$('.product-images').slick({
		dots: true
	});

	$(".select2_demo_2").select2();
});
</script>
@stop