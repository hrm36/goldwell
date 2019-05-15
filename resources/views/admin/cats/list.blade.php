@extends('admin.layouts.default')

@section('css')

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
				{{-- Data table --}}
				<div class="table-responsive">
					<table class="table table-striped">
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
										<a href="#" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
										<a href="#" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
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

@stop