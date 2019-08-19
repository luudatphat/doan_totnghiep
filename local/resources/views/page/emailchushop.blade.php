<div id="wrap-inner">			
	<div id="hoa-don">
		<h3>Thông tin sản phẩm được đặt</h3>							
		<table border="1" cellspacing="0" class="table-bordered table-responsive">
			<tr class="bold">
				<td >Mã sản phẩm</td>
				<td >Tên sản phẩm</td>
				<td >Giá</td>
				<td >Số lượng</td>
				<td >Thành tiền</td>
			</tr>
			@foreach($chitiethoadon as $item)
			<tr>
				<td>{{$item->masanpham}}</td>
				<td>{{$item->tensanpham}}</td>
				<td>{{number_format($item->gia)}}</td>
				<td>{{$item->soluong}}</td>
				<td>{{number_format($item->gia*$item->soluong)}}</td>
			</tr>
			@endforeach
			
		</table>
	</div>
	<div id="xac-nhan">
		<br>
		<p align="justify">
			• Vui lòng chủ shop chuẩn bị sản phẩm như trong phần <u>thông tin sản phẩm được đặt</u>.<br />
			• Nhân viên vận chuyển sẽ liên hệ với Chủ shop qua Số Điện thoại trước khi lấy hàng 24 tiếng.<br />
			<b><br />Cám ơn Chủ shop đã tin tưởng Công ty chúng Tôi và chúc Chủ shop luôn AN KHANG THỊNH VƯỢNG!</b>
		</p>
	</div>
</div>					