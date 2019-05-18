@extends('admin.layouts.default')

@section('css')

@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Danh sách tin tức</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="{{route('list-brand')}}">Danh sách bài viết</a>
			</li>
			<li class="active">
				<strong>Tất cả bài viết</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="{{route('create-brand')}}" class="btn btn-primary">Thêm mới</a>
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
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                <strong>{{session('thongbao')}}</strong>
                            </div>
                        @endif
				<div class="table-responsive">
					<table class="table table-striped">
						<thead style="color: #000;font-weight: bold;">
							<tr>
								<td class="text-center">ID</td>
								<td class="text-center">Ảnh đại diện</td>
								<td class="text-center">Tiêu đề</td>
								<!-- <td class="text-center">Mô tả</td> -->
								<td class="text-center">Trạng thái</td>
							</tr>
						</thead>
						<tbody>
							@foreach($brand as $p)
								<tr>
									<td class="text-center">{{$p->id}}</td>
									<td class="text-center"><img src="{{$p->image}}" width="100px"></td>				
                                    <td class="text-center">{{$p->name}}</td>
                                   <!--  <td class="text-center">{{$p->des_s}}</td> -->
                                    <td class="text-center">{{$p->status}}</td>
									<td class="text-center">
										<a href="{{route('edit-brand',['id'=>$p->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
										<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal{{$p->id}}"><i class="fa fa-trash"></i></button>
										<div id="myModal{{$p->id}}" class="modal fade" role="dialog">
  											<div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Bạn có muốn xóa?</h4>
											      </div>
											      <div class="modal-body">
											        <button class="btn hoi"><a href="{{route('del-brand',['id'=>$p->id])}}">Có</a></button><button type="button" class="close" data-dismiss="modal">Không</button>
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

@stop