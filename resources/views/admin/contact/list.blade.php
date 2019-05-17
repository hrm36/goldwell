@extends('admin.layouts.default')

@section('title')
Danh sách thông tin liên hệ
@parent
@stop

@section('css')
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Danh sách thông tin liên hệ</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a>Danh sách liên hệ</a>
			</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins" style="margin-top: 20px;">
				<div class="ibox-content-c col-lg-12">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="text-center">ID </th>
										<th class="text-center">Danh xưng </th>
										<th class="text-center">Họ và tên </th>
										<th class="text-center">Email </th>
										<th class="text-center">Số điện thoại </th>
										<th class="text-center">Số đường </th>
										<th class="text-center">Thành phố </th>
										<th class="text-center">Lời nhắn</th>
									</tr>
								</thead>
								<tbody>
									@if($data->count()>0)
									@foreach($data as $item)
									<tr>
										<td class="text-center">{{$item->id}}</td>
										<td class="text-center">{{$item->sex}}</td>
										<td class="text-center">{{$item->fullname}}</td>
										<td class="text-center">{{$item->email}}</td>
										<td class="text-center">{{$item->phone}}</td>
										<td class="text-center">{{$item->street}}</td>
										<td class="text-center">{{$item->city}}</td>
										<td class="text-center">{{$item->content}}</td>
										<td>
											<a href="edit/{{$item->id}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
										</td>
									</tr>
									@endforeach
									@else
									<tr><td colspan="5"><h4>Không có dữ liệu để hiển thị</h4></td></tr>  
									@endif
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="wrapper wrapper-content">
		</div>
		@stop
		
