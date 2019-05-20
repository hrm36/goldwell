<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead style="color: #000;font-weight: bold;">
		<tr>
			<td class="text-center">Loại tin</td>
			<td class="text-center">Sản phẩm</td>
			<td class="text-center">Ảnh</td>
			<td class="text-center">Nội dung</td>
			<td class="text-center">Status</td>
			<td class="text-center">Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($exts as $ex)
		<tr>
			<td class="text-center">{{($ex->type == 0) ? "Quy trình" : "Công Nghệ"}}</td>
			<td class="text-center">{{$ex->product != null ? $ex->product->name : "" }}</td>
			<td class="text-center"><img src="{{$ex->image}}" width="100px"></td>				
			<td class="text-center">{!! $ex->content !!}</td>
			<td class="text-center">
				@if ($ex->status == 1)
				<span class="label label-primary">Đang sử dụng</span></a>
				@else
				<span class="label label-warning">Ngừng sử dụng</span></a>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('extra.edit',['id'=>$ex->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal{{$ex->id}}"><i class="fa fa-trash"></i></button>
				<div id="myModal{{$ex->id}}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Bạn có muốn xóa?</h4>
							</div>
							<div class="modal-body">
								<form class="ps-form--checkout" role="form" action="{{route('extra.destroy',['id' => $ex->id])}}" 
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