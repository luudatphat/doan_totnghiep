@extends('master')
@section('content')



	<div id="hoa-don">
		<table border="5" cellspacing="0" class="table-bordered table-responsive">
			@foreach($iop as $item)
				<tr class="bold">
					<td >Tên người đặt</td>
					<td>{{$item->tennguoidat}}</td>
				</tr>
				<tr class="bold">
					<td >Điện thoại</td>
					<td>{{$item->dienthoai}}</td>
				</tr>
				<tr class="bold">
					<td >EMail</td>
					<td>{{$item->email}}</td>
				</tr>
				<tr class="bold">
					<td >Địa Chỉ</<td>
					<td>{{$item->sonha}} {{$item->tenduong}} {{$item->diachi}} {{$item->tinhthanh}}</td>
				</tr>
				<tr class="bold">
					<td >Ngày đặt</td>
					<td>{{$item->created_at}}</td>
				</tr>
			@endforeach

		</table>
		<h3>Hóa đơn mua hàng</h3>							
		<table border="5" cellspacing="0" class="table-bordered table-responsive">
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
	<div id="wrap-inner">
		<div id="complete">
			<p class="info">Quý khách đã đặt hàng thành công!</p>
			<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email đã đặt </p>
			<p>• Kiểm tra đơn đặt hàng của quý khách ở mục thông tin cá nhân-><a href="{{route('hoadon')}}">đơn hàng</a>.</p>
			<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ da dat trong thời gian sớm nhất, tính từ thời điểm này.</p>
			<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
			<p>• Trụ sở chính: TPHCM</p>
			<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
		</div>
		<p class="text-right return"><a href="#">Quay lại trang chủ</a></p>
	</div>	

@endsection