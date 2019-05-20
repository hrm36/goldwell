@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Danh sách sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="#">Danh sách sản phẩm</a>
			</li>
			<li class="active">
				<strong>Tất cả các sản phẩm</strong>
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
				<h5>Tất cả sản phẩm</h5>
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
								<th class="text-center">ID</th>
								<th class="text-center">Ảnh đại diện</th>
								<th class="text-center">Tên sản phẩm</th>
								<th class="text-center">Mô tả</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $p)
								<tr>
									<td class="text-center">{{$p->id}}</td>
									<td class="text-center"><img src="{{$p->image}}" style="max-width:90px"></td>
									<td class="text-center">{{$p->name}}</td>					
                                    <td class="text-center">{!! $p->des_s !!}</td>
									<td class="text-center">
										<a href="{{route('update-sp',['slug'=>$p->slug])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
										<a href="{{route('delete-sp',['slug'=>$p->slug])}}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
									</td>
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