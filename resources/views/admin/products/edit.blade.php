
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
		<h2>Thay đổi thông tin sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-sp')}}">Danh sách sản phẩm</a>
			</li>
			<li class="active">
				<strong>Thay đổi thông tin sản phẩm</strong>
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
				<h5>Thông tin sản phẩm</h5>
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
						<div id="style" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="ibox product-detail">
									<div class="ibox-content">
										<div class="row">
											<div class="col-md-3">
												<div>
													<img src="http://khotheme.hamrongmedia.com/goldwell/source/System/style-product/style-1.png" style="max-width: 100%; max-height: 100%;">
												</div>
											</div>
											<div class="col-md-4">
												<div>
													<img src="http://khotheme.hamrongmedia.com/goldwell/source/System/style-product/style-2.png" style="max-width: 100%; max-height: 100%;">
												</div>
											</div>
											<div class="col-md-3">
												<h2 class="font-bold m-b-xs">
													Chọn giao diện hiển thị cho sản phẩm mới
												</h2>
												<small>Xem mẫu giao diện ở slide bên cạnh và lựa chọn theo tên</small>
												<hr>
												<div class="text-left">
													<div class="btn-group">
														<input type="hidden" name="dis_type" id="dis_type" value='{{$product->dis_type}}'>
														<a data-style=1 class="btn {{$product->dis_type == 1 ? 'btn-success': 'btn-white'}} btn-sm choose-style">
															<i class="fa fa-star"></i> Giao diện 1
														</a>
														<a data-style=2 class="btn {{$product->dis_type == 2 ? 'btn-success': 'btn-white'}}  btn-sm choose-style">
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

								<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
									<label class="col-sm-2 control-label">Banner (*)</label>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-btn">
												<a href="{{env("URL_FILEMANAGE_1", "")}}"
												class="btn btn-primary red iframe-btn" id="iframe-edit-pro"><i
												class="fa fa-picture-o"></i>Chọn ảnh</a>
											</span>
											<input id="thumb_0" value="{{$product->image}}" class="form-control" type="text" name="image" required>
										</div>
										<div id="preview">
											<div class="img_preview"><img src="{{$product->image}}"/></div>
										</div>
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
									<label class="col-sm-2 control-label">Danh mục(*)</label>

									<div class="col-md-4">
										<select class="form-control m-b" name="cat_id" id="cat_id" required>
											<option value="">Chọn chuyên mục</option>
											@foreach($cat as $p)
												<option value="{{$p->id}}" {{isset($product->cat_id) ? ($product->cat_id == $p->id ? "selected" : "") : ""}}>{{$p->name}}</option>
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
						<button class="btn btn-white" type ="reset">Reset</button>
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
<!-- slick carousel-->
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script>
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
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});
		
		CKEDITOR.replace( 'des_s' ,{
			filebrowserBrowseUrl : fmPath_2,
			filebrowserUploadUrl : fmPath_2,
			filebrowserImageBrowseUrl : fmPath_2,
		});

		$('.product-images').slick({
			dots: true
		});

		$(".select2_demo_2").select2();
		settingIframe("#iframe-edit-pro");
	});
</script>
@stop