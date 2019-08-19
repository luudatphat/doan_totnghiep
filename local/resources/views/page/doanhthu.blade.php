
@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->
	
    <h2 class="product-head">Kết quả thống kê</h2> 
	@if(isset($thongbao))
	<div class="alert alert-success">
		{{$thongbao}}
	</div>
	@endif
    @if(isset($hoadon))
	<?php $tongdt=0;?>
	<div>
	
	
		<table class="table table-hover">
			<tr>
				<td>Mã hóa đơn</td>
				<td>Tên sản phẩm</td>
				<td>Đơn giá</td>
				<td>Số lượng</td>
				<td>Tổng tiền</td>
			</tr>
			@foreach($hoadon as $hd)
			<tr>
				<?php $tong = $hd->gia * $hd->soluong; 
				$tongdt = $tongdt + $tong; ?>
				<td>{{ $hd->ma }}</td>
				<td >{{ $hd->tensanpham }}</td>
				<td style="width=60px;">{{ number_format($hd->gia) }}</td>
				<td>{{ $hd->soluong }}</td>
				
				<td>{{ number_format($tong)  }}</td>
			</tr>
			
			@endforeach
			<td>Tổng</td>
			<td></td>
			<td></td>
			<td></td>
			<td>{{ number_format($tongdt) }} VNĐ</td>
		</table>
	</div>
	@endif
	<!-- Main Container Ends -->

<!-- Footer Section Ends -->
<!-- JavaScript Files -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>	
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-hover-dropdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
@endsection