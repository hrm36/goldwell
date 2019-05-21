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
		<h2>Nội dung SEO</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li class="active">
				<strong>SEO webiste</strong>
			</li>
		</ol>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Nội dung SEO</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<div class="ibox product-detail">
					<div class="row">
						<div class="col-md-12">							
							<h2 class="font-bold m-b-xs">
								Thẻ meta
							</h2>
							<div class="small text-muted">
								{{ $info['meta'] }}
							</div>
							<hr>
							<div class="btn-group">
								<a href="{{route('seo.edit', ['id' => 'info'])}}" class="btn btn-warning btn-sm">
									<i class="fa fa-edit"></i> Thay đổi thông tin
								</a>
								<a href="{{route('homepage')}}" class="btn btn-success btn-sm"><i class="fa fa-globe"></i> Xem trang</a>
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