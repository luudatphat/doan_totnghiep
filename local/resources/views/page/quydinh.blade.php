@extends('master')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Hướng dẫn sử dụng</h1>
		
		<div class="col-sm-12">
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52;"  >Đăng ký </span> <br>
				
				<span style="font-size: 17px;"><b style="color: red;">Lưu ý</b>:<b>Tên đăng nhập</b> và <b>địa chỉ email</b> sẽ không được thay đổi sau khi đã đăng ký.</span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 100%;">
				<img src="images/misc/dangky.png" alt="image" class="img-responsive" style="    width: 75%;" />
			</div>
			<div class="col-sm-12">
				
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Đăng nhập </span> <br>
				<span style="font-size: 17px;">- Nhập tên đăng nhập và mật khẩu.</span><br>
				<span style="font-size: 17px;">- Nếu bạn chưa có tài khoản đăng nhập có thể vào phần đăng ký tạo tài khoản mới.</span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 100%;">
				<img src="images/misc/dangnhap.png" alt="image" class="img-responsive" />
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Coi thông tin cá nhân </span> <br>
				<span style="font-size: 17px;">- Ở trang chủ , nhấn vào tên của mình sẽ vào được trang thông tin cá nhân </span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 150%;">
				<img src="images/misc/thongtin.png" alt="image" class="img-responsive" style="width: 75%;"/>
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Thông tin cá nhân </span> <br>
				
				<span style="font-size: 17px;">- Các thông tin cá nhân đã đăng ký ban đầu ( bạn không thể thay đổi được <b>tên đăng nhập</b> và <b>email</b> )</span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px;     width: 120%;">
				<img src="images/misc/suathongtin1.png" alt="image" class="img-responsive"  />
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Đổi mật khẩu</span> <br>
				
				<span style="font-size: 17px;">- Nhập lại mật khẩu cũ và mật khẩu mới</span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 120%;">
				<img src="images/misc/doimatkhau.png" alt="image" class="img-responsive" />
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Đơn hàng</span> <br>
				<span style="font-size: 17px;"><b style="color: red;">Lưu ý</b> : khi đơn hàng trong trạng thái <b>chưa xử lý </b>thì bạn có thể hủy đơn hàng .Còn các trạng thái khác thì không thể hủy</span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 150%;">
				<img src="images/misc/donhang.png" alt="image" class="img-responsive" style="    width: 200%;" />
			</div>

			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Mua hàng </span> <br>
				<span style="font-size: 17px;">-Chọn sản phẩm bạn muốn mua và nhấn vào <b>"Đặt mua ngay"</b></span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 120%;">
				<img src="images/misc/muahang.png" alt="image" class="img-responsive" style="    width: 200%;" />
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Giỏ hàng </span> <br>
				<span style="font-size: 17px;">-Sau khi chọn sản phẩm muốn mua , sẽ được đưa vào <b>Giỏ hàng</b>. Khách hàng có thể mua thêm sản phẩm nhấn vào <u>TIẾP TỤC MUA HÀNG </u> hoặc nhấn<u>THANH TOÁN</u> </span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 120%;">
				<img src="images/misc/GIOHANG.png" alt="image" class="img-responsive" style="    width: 200%;" />
			</div>
			<div class="col-sm-12">
				<i class="glyphicon glyphicon-asterisk"></i><span style="font-weight: bold; font-size: 20px ; color: #4bac52"  >Thanh toán </span> <br>
				<span style="font-size: 17px;">-Nhập đầy đủ các thông tin trong hình , sau khi đặt hàng thành công . <b>Shop bán sản phẩm </b> sẽ liên hệ với bạn trong thời gian ngắn nhất để xác nhận đơn hàng của bạn , bạn có thể xem tình trạng đơn hàng trong thông tin đơn hàng của khách hàng. </span>
			</div>
			<div class="col-sm-8" style=" margin-top: 20px;margin-bottom: 40px; width: 120%;">
				<img src="images/misc/thanhtoan.png" alt="image" class="img-responsive" />
			</div>

		</div>
	</div>
</div>


@endsection