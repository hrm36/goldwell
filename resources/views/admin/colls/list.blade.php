@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Danh sách bộ sưu tập </h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li class="active">
				<strong>Tất cả bộ sưu tập</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('coll.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Tất cả bộ sưu tập</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				{{-- Data table --}}
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<strong>{{$err}}</strong><br>
					@endforeach
				</div>
				@endif

				@if(session('error'))
				<div class="alert alert-danger">
					<strong>{{session('error')}}</strong>
				</div>
				@endif
				@if(session('success'))
				<div class="alert alert-success">
					<strong>{{session('success')}}</strong>
				</div>
				@endif
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover dataTables-example">
						<thead style="color: #000;font-weight: bold;">
							<tr>
								<td class="text-center">ID</td>
								<td class="text-center">Ảnh</td>
								<td class="text-center">Tên bộ sưu tập</td>
								<td class="text-center">Thời gian</td>
								<!-- <td class="text-center">Mô tả</td> -->
								<td class="text-center">Trạng thái</td>
								<td class="text-center">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($colls as $coll)
							<tr>
								<td class="text-center">{{$coll->id}}</td>
								<td class="text-center"><img src="{{$coll->image}}" width="100px"></td>
								<td class="text-center">{{$coll->name}}</td>			
								<td class="text-center">{{$coll->time}}</td>
								<td class="text-center">
									@if ($coll->status == 1)
									<span class="label label-primary">Đang sử dụng</span></a>
									@else
									<span class="label label-warning">Ngừng sử dụng</span></a>
									@endif
								</td>
								<td class="text-center">
									<a href="{{route('coll.edit',['id'=>$coll->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal{{$coll->id}}"><i class="fa fa-trash"></i></button>
									<div id="myModal{{$coll->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Bạn có muốn xóa?</h4>
												</div>
												<div class="modal-body">
													<form class="ps-form--checkout" role="form" action="{{route('coll.destroy',['id' => $coll->id])}}" 
														enctype="multipart/form-data" method="POST">
														@method('DELETE')
														@csrf
														<button class="btn hoi">Có</button><button type="button" class="close" data-dismiss="modal">Không</button>
													</form>
												</div>
											</div>
										</div>
									</div>
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