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
				<a href="#">Tất cả danh mục</a>
			</li>
			<li class="active">
				<strong>Tất cả danh mục sản phẩm</strong>
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
				<h5>Tất cả danh mục</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				@if(session('thongbao'))
				<div class="alert alert-success">
					<strong>{{session('thongbao')}}</strong>
				</div>
				@endif
				@if(session('err'))
				<div class="alert alert-danger">
					<strong>{{session('err')}}</strong>
				</div>
				@endif
				{{-- Data table --}}
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover dataTables-example">
						<thead>
							<tr>
								<th class="text-center">Tên danh mục</th>
								<th class="text-center">Loại danh mục</th>
								<th class="text-center">Danh mục cha</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cats as $c)
								<tr>
									<td class="text-center">{{$c->name}}</td>
									<td class="text-center">{{$c->type == 0 ? "Có danh mục con" : "Không có danh mục con"}}</td>									
                                    <td class="text-center">{{$c->parent}}</td>
									<td class="text-center">
										<a href="{{route('update-dm',['id'=>$c->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
										<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal{{$c->id}}"><i class="fa fa-trash"></i></button>
										<div id="myModal{{$c->id}}" class="modal fade" role="dialog">
  											<div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Bạn có muốn xóa?</h4>
											      </div>
											      <div class="modal-body">
											        <button class="btn hoi"><a href="{{route('delete-dm',['id'=>$c->id])}}">Có</a></button><button type="button" class="close" data-dismiss="modal">Không</button>
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