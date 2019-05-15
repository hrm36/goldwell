@extends('admin.layouts.default')

@section('title')
Danh sách người dùng
@parent
@stop

@section('css')
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Danh sách người dùng</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a>Danh sách người dùng</a>
			</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-5 ">	
							<select class="input-sm form-control input-s-sm inline">
								<option value="-">Tác vụ</option>
								<option value="0">Xóa</option>
								<option value="1">Chỉnh sửa</option>
							</select>
						</div>
					<div class="col-sm-4 m-b-xs">
						<div data-toggle="buttons" class="btn-group">
							<label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Đang hoạt động </label>
							<label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Đang tạm ngừng </label>
							<label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Tất cả </label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
							<button type="button" class="btn btn-sm btn-primary"> Tìm kiếm</button> </span></div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><input type="checkbox"  checked class="i-checks" name="input[]"></th>
									<th>Tên </th>
									<th>Email </th>
									<th>Ngày tạo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="checkbox"  checked class="i-checks" name="input[]"></td>
									<td>Project<small>This is example of project</small></td>
									<td><span class="pie">0.52/1.561</span></td>
									<td>Jul 14, 2013</td>
									<td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="i-checks" name="input[]"></td>
									<td>Alpha project</td>
									<td><span class="pie">6,9</span></td>
									<td>Jul 16, 2013</td>
									<td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="i-checks" name="input[]"></td>
									<td>Betha project</td>
									<td><span class="pie">3,1</span></td>
									<td>Jul 18, 2013</td>
									<td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="i-checks" name="input[]"></td>
									<td>Gamma project</td>
									<td><span class="pie">4,9</span></td>
									<td>Jul 22, 2013</td>
									<td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
								</tr>
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
	@section('script')
	
    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('assets/js/demo/peity-demo.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

	@stop
