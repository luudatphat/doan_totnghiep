<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Thông tin khách hàng</h3>
		@foreach($hoadon as $info)
			<p>
				<span class="info">Khách hàng: </span>
				{{$info->tennguoidat}}
			</p>
			<p>
				<span class="info">Email: </span>
				{{$info->email}}
			</p>
			<p>
				<span class="info">Điện thoại: </span>
				{{$info->dienthoai}}
			</p>
			<p>
				<span class="info">Địa chỉ: </span>
				{{$info->diachi}}
			</p>
		@endforeach
	</div>						
	<div id="hoa-don">
		<h3>Đơn hàng đã hủy</h3>							
		<table border="1" cellspacing="0" class="table-bordered table-responsive">
			<tr class="bold">
				<td >Tên sản phẩm</td>
				<td >Số lượng</td>
				<td >Giá</td>
				<td >Thành tiền</td>
			</tr>
			@foreach($chitiethoadon as $item)
			<tr>
				<td>{{$item->tensanpham}}</td>
				<td>{{$item->soluong}}</td>
				<td class="price">{{number_format(($item->gia),0,',','.')}} vnd</td>
				<td class="price">{{number_format(($item->soluong*$item->gia),0,',','.')}} </td>
			</tr>
			@endforeach
		
			@foreach($hoadon as $value)
			<tr>
				<td colspan="3">Thành tiền:</td>
				<td class="total-price">{{number_format($value->tongtienchuathue,0,',','.')}}</td>
			</tr>
			<tr>
				<td colspan="3">Phí giao:</td>
				<td class="total-price">{{number_format($value->phiship,0,',','.')}}</td>
			</tr>
			<tr>
				<td colspan="3">Tổng tiền( Đã tính phí giao ):</td>
				<td class="total-price">{{number_format($value->tongtien,0,',','.')}}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div id="xac-nhan">
		<br>
		<p align="justify">
			<b>Đơn hàng đã hủy !</b><br />
			• Sản phẩm của Quý khách đặt đã được hủy.<br />
			
		</p>
	</div>
</div>					