<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Thông tin khách hàng</h3>
		<p>
			<span class="info">Khách hàng: </span>
			{{$info['ten']}}
		</p>
		<p>
			<span class="info">Email: </span>
			{{$info['email']}}
		</p>
		<p>
			<span class="info">Điện thoại: </span>
			{{$info['sdt']}}
		</p>
		<p>
			<span class="info">Địa chỉ: </span>
			{{$info['sonha']}} {{$info['tenduong']}} {{$info['phuong']}} {{$info['diachi']}} , {{$info['tinhthanh']}}
		</p>
	</div>						
	<div id="hoa-don">
		<h3>Hóa đơn mua hàng</h3>							
		<table border="1" cellspacing="0" class="table-bordered table-responsive">
			<tr class="bold">
				<td >Tên sản phẩm</td>
				<td >Giá</td>
				<td >Số lượng</td>
				<td >Thành tiền</td>
			</tr>
			@foreach($cart as $item)
			<tr>
				<td>{{$item->name}}</td>
				<td class="price">{{number_format($item->price,0,',','.')}} vnd</td>
				<td>{{$item->qty}}</td>
				<td class="price">{{number_format(($item->price*$item->qty),0,',','.')}} </td>
			</tr>
			@endforeach
			<tr>
				<td colspan="3">Thành tiền:</td>
				<td class="total-price">{{number_format(($subtotal),0,',','.')}}</td>
			</tr>
			@if($hinhthucgiao > 0)
			<tr>
				<td colspan="3">Phí giao:</td>
				<td class="total-price">{{number_format(($congtongship*3),0,',','.')}}</td>
			</tr>
			<tr>
				<td colspan="3">Tổng tiền( Đã tính phí giao ):</td>
				<td class="total-price">{{number_format(($subtotal+($congtongship*3)),0,',','.')}}</td>
			</tr>
			@else
			<tr>
				<td colspan="3">Phí giao:</td>
				<td class="total-price">{{number_format(($congtongship),0,',','.')}}</td>
			</tr>
			<tr>
				<td colspan="3">Tổng tiền( Đã tính phí giao ):</td>
				<td class="total-price">{{number_format(($subtotal+$congtongship),0,',','.')}}</td>
			</tr>
			@endif
		</table>
	</div>
	<div id="xac-nhan">
		<br>
		<p align="justify">
			<b>Quý khách đã đặt hàng thành công!</b><br />
			• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ đã đặt trong thời gian sớm nhất, tính từ thời điểm này.<br />
			• Kiểm tra đơn đặt hàng của quý khách ở mục thông tin cá nhân->đơn hàng.<br />
			• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
			<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
		</p>
	</div>
</div>					