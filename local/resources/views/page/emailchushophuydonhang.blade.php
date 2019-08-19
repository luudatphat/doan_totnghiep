<div id="wrap-inner">			
	<div id="hoa-don">
		<h3>Thông tin sản phẩm bị trả lại</h3>							
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
			• Xin chân thành xin lỗi vì sản phẩm không đến được tay người dùng</u>.<br />
			• Nhân viên vận chuyển đã liên hệ với khách hàng, nhưng không thấy khách hàng phản hồi lại .<br />
			• Sản phẩm đã giao mà không được khách hàng lấy , nhân viên vận chuyển sẽ trả lại cho shop trong 36 tiếng .<br />
			<b><br />Cám ơn Chủ shop đã tin tưởng Công ty chúng Tôi và chúc Chủ shop luôn AN KHANG THỊNH VƯỢNG!</b>
		</p>
	</div>
</div>					