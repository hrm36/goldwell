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
		<h2>Thông tin webiste</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li class="active">
				<strong>Thông tin webiste</strong>
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
				<h5>Thông tin webiste</h5>
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
									<label>
										LOGO
									<img src="{{$info['logo']}}" style="max-width: 100%; max-height: 100%;"></label>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<h2 class="font-bold m-b-xs">
								Iframe FB
							</h2>
							<div class="small text-muted">
							{{ $info['facebook'] }}
							</div>
							<hr>
							<h3 class="font-bold m-b-xs">
								Link FB
							</h3>
							<div class="small text-muted">
							{{ $info['url_facebook'] }}
							</div>
							<hr>
							<h3 class="font-bold m-b-xs">
								Link Instagram
							</h3>
							<div class="small text-muted">
							{{ $info['url_ins'] }}
							</div>
							<hr>
							<h3 class="font-bold m-b-xs">
								Link Youtube
							</h3>
							<div class="small text-muted">
							{{ $info['url_you'] }}
							</div>
							<hr>

							<h2 class="font-bold m-b-xs">
								Chính sách
							</h2>

							<div class="small text-muted">
							{!! $info['open_time'] !!}
						</div>
						<hr>

						<h2 class="font-bold m-b-xs">
							Số điện thoại liên hệ
						</h2>

						<div class="small text-muted">
							{!! $info['phone'] !!}
						</div>
						<hr>
						<h2 class="font-bold m-b-xs">
							Địa chỉ
						</h2>

						<div class="small text-muted">
							{!! $info['address'] !!}
						</div>
						<hr>
						<div>
							<div class="btn-group">
								<a href="{{route('system.edit', ['id' => 'info'])}}" class="btn btn-warning btn-sm">
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