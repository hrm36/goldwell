@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
        <h2>Quản lý trang liên kết</h2>
        <ol class="breadcrumb">
	        <li>
	            <a href="{{route('dashboard')}}">Home</a>
	        </li>
	        <li>
	            <a href="{{route('danh-sach-lien-ket')}}">Danh sách trang liên kết</a>
	        </li>
	        <li class="active">
	            <strong>Quản lý các trang liên kết</strong>
	        </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="{{route('them-moi-lien-ket')}}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
	            <h5>Danh sách các trang liên kết</h5>
	            <div class="ibox-tools">
		            <a class="collapse-link">
		                <i class="fa fa-chevron-up"></i>
		            </a>
	            </div>
	        </div>
	        <div class="ibox-content">
	        	<div class="row">
                    <div class="col-sm-5 m-b-xs">
                        <div class="btn-group">
	                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Tác vụ 
	                        	<span class="caret"></span>
	                        </button>
	                        <ul class="dropdown-menu">
	                            <li><a href="#" class="font-bold">Xóa</a></li>
	                            <li><a href="#" class="font-bold">Chỉnh sửa</a></li>
	                        </ul>
                        </div>
                    </div>
                 </div>	        	
                <div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th><input type="checkbox"  class="i-checks" namse="input[]"></th>
								<th class="text-center">Logo</th>
								<th class="text-center">Link</th>
								<th class="text-center"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox"   class="i-checks" name="input[]"></td>
								<td class="text-center" style="width:180px">
									<img src="{{asset('source/ajinomoto/lien-ket/ajinomoto.jpg')}}" alt="" width="150" height="80">
                                </td>
								<td class="text-center"><a href="https://www.ajinomoto.com.vn">https://www.ajinomoto.com.vn</a></td>
								<td class="text-center">
									<a href="#" class="btn btn-default  btn-circle"><i class="fa fa-edit"></i></a>
									<a href="#" class="btn btn-default btn-circle"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox"   class="i-checks" name="input[]"></td>
								<td class="text-center" style="width:180px">
									<img src="{{asset('source/ajinomoto/lien-ket/cooking.jpg')}}" alt="" width="150" height="80">
                                </td>
                                <td class="text-center">
                                	<a href="https://www.ajinomotocookingstudio.com">
                                	https://www.ajinomotocookingstudio.com
                                	</a>
                                </td>
								<td class="text-center">
									<a href="#" class="btn btn-default  btn-circle"><i class="fa fa-edit"></i></a>
									<a href="#" class="btn btn-default btn-circle"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox"   class="i-checks" name="input[]"></td>
								<td class="text-center" style="width:180px">
									<img src="{{asset('source/ajinomoto/lien-ket/mon-ngon.jpg')}}" alt="" width="150" height="80">
                                </td>
                                <td class="text-center">
                                	<a href="https://monngonmoingay.com/">
                                	https://monngonmoingay.com/
                                	</a>
                                </td>
								<td class="text-center">
									<a href="#" class="btn btn-default  btn-circle"><i class="fa fa-edit"></i></a>
									<a href="#" class="btn btn-default btn-circle"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox"   class="i-checks" name="input[]"></td>
								<td class="text-center" style="width:180px">
								<img src="{{asset('source/ajinomoto/lien-ket/bua-an-hoc-duong.jpg')}}" alt="" width="150" height="80">
                                </td>
                                <td class="text-center">
                                	<a href="http://buaanhocduong.com.vn/">
                                	http://buaanhocduong.com.vn/
                                	</a>
                                </td>
								<td class="text-center">
									<a href="#" class="btn btn-default  btn-circle"><i class="fa fa-edit"></i></a>
									<a href="#" class="btn btn-default btn-circle"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
	        </div>
		</div>
	</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

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