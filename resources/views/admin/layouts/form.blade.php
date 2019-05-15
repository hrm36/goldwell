 @if (count($errors) > 0)
 <div class="alert alert-danger">
 	Thông tin tạo mới chưa chính xác, bạn cần chỉnh sửa như sau:
 	<ul>
 		@foreach ($errors->all() as $error)
 		<li>{{ $error }}</li>
 		@endforeach
 	</ul>
 </div>
 @endif
 @if (isset($message))
 <div class="alert alert-success">
 	{{ $message }}
 </div>
 @endif
 <form class="form-horizontal" role="form" action="#" 
 enctype="multipart/form-data" method="POST">
 @csrf
 <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
 	<label class="col-sm-2 control-label">Logo</label>
 	<div class="col-sm-10">
 		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
 			<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
 				<span class="fileinput-filename"></span>
 			</div>
 			<span class="input-group-addon btn btn-default btn-file">
 				<span class="fileinput-new">Chọn ảnh</span>
 				<span class="fileinput-exists">Thay đổi</span>
 				<input type="file" name="logo">
 			</span>
 			<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a>
 		</div>						
 	</div>
 </div>	                
 <div class="hr-line-dashed"></div>

 <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
 	<label class="col-sm-2 control-label">Tên themes </label>
 	<div class="col-sm-10">
 		<input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
 	</div>
 </div>
 <div class="hr-line-dashed"></div>

 <div class="form-group">
 	<div class="col-sm-4 col-sm-offset-2">
 		<button class="btn btn-white" >Làm mới</button>
 		<button class="btn btn-primary" type="submit">Tạo mới</button>
 	</div>
 </div>	  

</form>