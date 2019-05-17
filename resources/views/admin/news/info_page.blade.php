@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/slick/slick.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Thông tin trang</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-news')}}">Danh sách tin tức</a>
			</li>
			<li class="active">
				<strong>Thông tin trang</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="#" class="btn btn-primary">Trang quy trình</a>
			<a href="#" class="btn btn-primary">Trang công nghệ</a>
			<a href="#" class="btn btn-primary">Trang chuyên mục</a>
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
				<h5>Thông tin trang tin tức</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<div class="ibox product-detail">
					<div class="row">
						<div class="col-md-5">
							<div class="product-images">
								<div>
									<img src="{{$info['image']}}" style="max-width: 100%; max-height: 100%;">
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<h2 class="font-bold m-b-xs">
								{{$info['title']}}
							</h2>
							<small>Tiêu đề</small>
							<hr>

							<h4>Nội dung</h4>

							<div class="small text-muted">
								{!! $info['content'] !!}
							</div>
							<hr>
							<div>
								<div class="btn-group">
									<a href="{{route('page-news-ed')}}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Thay đổi thông tin
									</a>
									<a href="{{route('news')}}" class="btn btn-success btn-sm"><i class="fa fa-globe"></i> Xem trang</a>
								</div>
							</div>                           				
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>

<script type="text/javascript">
	$('.product-images').slick({
		dots: true
	});
</script>
@stop