@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Danh sách CONTACTS</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('dashboard')}}">Danh sách liên hệ</a>
			</li>
			<li class="active">
				<strong>Tất cả các liên hệ</strong>
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
				<h5>Tất cả các liên hệ</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				{{-- Data table --}}
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover dataTables-example">
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
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{-- END Data table --}}		
			</div>
		</div>
	</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.dataTables-example').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [
			{ extend: 'copy'},
			{extend: 'csv'},
			{extend: 'excel', title: 'ExampleFile'},
			{extend: 'pdf', title: 'ExampleFile'},
			{extend: 'print',
			customize: function (win){
				$(win.document.body).addClass('white-bg');
				$(win.document.body).css('font-size', '10px');
				$(win.document.body).find('table')
				.addClass('compact')
				.css('font-size', 'inherit');
			}
		}
		]
	});
	});
</script>
@stop