
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
		<h2>Tạo mới sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="#">Danh sách sản phẩm</a>
			</li>
			<li class="active">
				<strong>Tạo mới sản phẩm</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="#" class="btn btn-primary">Trở về danh sách sản phẩm</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content ">
	<div class="row animated fadeInRight">		
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin sản phẩm mới</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			{{-- START FORM --}}
			<div class="ibox-content">
				<form id="form" class="form-horizontal" role="form" action="{{route('create-sp')}}" 
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
						<div id="style" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="ibox product-detail">
									<div class="ibox-content">
										<div class="row">
											<div class="col-md-5">
												<div class="product-images">
													<div>
														<img src="http://localhost:80/goldwell/public/source/top-nhung-hinh-anh-gai-dep-gai-xinh-nhat-hien-nay-15.png" style="max-width: 100%; max-height: 100%;">
													</div>
													<div>
														<img src="http://localhost:80/goldwell/public/source/banner-1.jpg" style="max-width: 100%; max-height: 100%;">
													</div>
												</div>
											</div>
											<div class="col-md-7">
												<h2 class="font-bold m-b-xs">
													Chọn giao diện hiển thị cho sản phẩm mới
												</h2>
												<small>Xem mẫu giao diện ở slide bên cạnh và lựa chọn theo tên</small>
												<hr>
												<div class="text-left">
													<div class="btn-group">
														<input type="hidden" name="dis_type" id="dis_type" value='1'>
														<a data-style=1 class="btn btn-success btn-sm choose-style">
															<i class="fa fa-star"></i> Giao diện 1
														</a>
														<a data-style=2 class="btn btn-white btn-sm choose-style">
															<i class="fa fa-star"></i> Giao diện 2
														</a>
													</div>
												</div>                                				
											</div>
										</div>
									</div>
								</div>	                            	
							</div>
						</div>
					</div>
					<!-- -->
					<!--Panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#info">Thông tin sản phẩm</a>
							</h5>
						</div>
						<div id="info" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Tên sản phẩm (*) </label>
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

								<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Miêu tả ngắn (*) </label>
									<div class="col-sm-10">
										<textarea name="des_s" id="des_s" class="form-control my-editor" rows="20" required>

										</textarea>
									</div>
								</div>

								<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Banner (*)</label>
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

								<div class="form-group {{ $errors->has('des_f') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Miêu tả chi tiết (*) </label>
									<div class="col-sm-10">
										<textarea name="des_f" id="des_f" class="form-control my-editor" rows="20" required>

										</textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Danh mục(*)</label>

									<div class="col-md-4">
										<select class="form-control m-b" name="cat_id" id="cat_id" required>
											<option value="">Chọn chuyên mục</option>
											@foreach($cat as $p)
												<option value="{{$p->id}}">{{$p->name}}</option>
											@endforeach
										</select>                                         
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sản phẩm bổ trợ</label>
									<div class="col-md-4">
										<select class="select2_demo_2 form-control" name="sp_botro[]" multiple="multiple">
											@foreach($list as $p)
												<option value="{{$p->id}}">{{$p->name}}</option>
											@endforeach
										</select>	                                           
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