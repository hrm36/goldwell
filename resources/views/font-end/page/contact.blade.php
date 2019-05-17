@extends('font-end.layouts.master')
@section('content')
<section id="product-page">
	<div class="container">
		<div class="breadcrumb-paginator-wrapper">
			<div id="breadcrumb">
				<a href="{{route('homepage')}}">GOLDWELL</a>
				<span class="spacer3"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<a href="{{route('contact')}}">CONTACT</a>
			</div>
		</div>
		<div class="header-page col-md-12">
			<h1>LIÊN LẠC</h1>
			<p class="bodytext">Câu hỏi hay phản hồi? Vui lòng điền vào mẫu dưới đây và chúng tôi sẽ liên lạc với bạn sớm nhất có thể.</p>
		</div>
		<div class="list-content">	
			<div class="form-rg">
				<form method="post" name="contact" class="standardform" action="contact">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
						<label for="salutation">Lời chào</label><span>*</span><br>
						<select class="form-control" name="sex" required="">
							<option value="-1">Xin hãy lựa chọn</option>
							<option value="Nam">Ông.</option>
							<option value="Nữ">Cô.</option>
						</select>

					</div>
					<div class="form-group">
							Họ và tên<br>
						<input class="form-control" type="text" name="fullname">
					</div>
					<div class="form-group">
						E-mail<br>
						<input class="form-control" type="text" name="email">		
					</div>
					<div class="form-group">
						Số đường *<br>	
						<input class="form-control" type="text" name="street" required="">
					</div>
					<div class="form-group">
						Thành phố *<br>	
						<input class="form-control" type="text" name="city" required="">	
					</div>
					<div class="form-group">
						Số điện thoại *<br>
						<input class="form-control" type="text" name="phone" required="">
					</div>
					<div class="form-group">
						Tin nhắn *<br>
						<textarea name="content" id="" rows="10" required=""></textarea>
					</div>
					<!-- becustomer = "0" -->
					<div class="form-group checkbox">
						<label for="allowaddressusage">
							<input class="form-control" type="checkbox" name="checkbox" value="1" required="">
							<span class="text">
						Tôi đồng ý với việc đồng ý lưu dữ liệu tôi đã cung cấp và sử dụng chúng cho mục đích nghiên cứu thị trường của KAO Đức và các cơ quan thực hiện các nghiên cứu này cho KAO Đức.</span>
					</label>
					</div>
					<div class="form-group">
						<span class="requiredFieldsInfoText">Các trường có dấu * là bắt buộc</span>
					</div>
					<div class="form-group">
					<input type="submit" value="gửi">
					</div>
					<!-- txt -->
				</form>
			</div>
		</div>
	</div>
</section>


@endsection