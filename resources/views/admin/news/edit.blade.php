
@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/slick/slick.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/fancybox/source/jquery.fancybox.css')}}">
<link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<style type="text/css">
	span.select2.select2-container.select2-container--default{
		width:100% !important;
	}
</style>
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thay đổi thông tin bài viết</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-sp')}}">Danh sách bài viết</a>
			</li>
			<li class="active">
				<strong>Thay đổi thông tin bài viết</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="#" class="btn btn-primary">Trở về danh sách bài viết</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content ">
	<div class="row animated fadeInRight">		
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin bài viết</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			{{-- START FORM --}}
			<div class="ibox-content">
				<form id="form" class="form-horizontal" role="form" action="{{route('update-sp',['slug'=>$product->slug])}}" 
				enctype="multipart/form-data" method="POST">
				@csrf
				<div class="panel-group payments-method" id="accordion">
					<!--Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#style">Giao diện hiển thị</a>
							</h5>
						</div>
					</div>
					<!-- -->
					<!--Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#info">Thông tin bài viết</a>
							</h5>
						</div>
						<div id="info" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Tên bài viết (*) </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
									</div>
								</div>

								<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Slug (*) </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="slug" id="slug" value="{{$product->slug}}">
									</div>
								</div>

								<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Miêu tả ngắn (*) </label>
									<div class="col-sm-10">
										<textarea name="des_s" id="des_s" class="form-control my-editor" rows="20" required>
										{!! $product->des_s !!}
										</textarea>
									</div>
								</div>


								<div class="form-group {{ $errors->has('des_f') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Miêu tả chi tiết (*) </label>
									<div class="col-sm-10">
										<textarea name="des_f" id="des_f" class="form-control my-editor" rows="20" required>
											{!! $product->des_f !!}
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Trạng thái (*)</label>

									<div class="col-md-4">
										<select class="form-control m-b" name="status">
											<option {{$product->status == 1 ? "selected" : ""}} value="1">Công khai</option>
											<option {{$product->status == 0 ? "selected" : ""}} value="0">Không công khai</option>
										</select>                                       
									</div>
								</div>	 	                            	
							</div>
						</div>
					</div>
					<!-- -->
				</div>	
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<button class="btn btn-white" >Làm mới</button>
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
<!-- slick carousel-->
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
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