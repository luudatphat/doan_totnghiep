
@extends('masterAdmin')
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
	<?php $tong=0;
			$phiship=0;
	?>
	<div>
	
	
		<table class="table table-hover">
			<tr>
				<td>Mã hóa đơn</td>
				<td>Tên người đặt</td>
				<td>Điện thoại</td>
				<td>Email</td>
				<td>Tổng Đơn</td>
                <td>Phí</td>
				<td>Phí Ship</td>
			</tr>
			@foreach($hoadon as $hd)
			<tr>
				<?php $tong = $tong + $hd->thue; 
						$phiship = $phiship + $hd->phiship
				?>
				<td><a href="{!! url('chitiethoadonad',$hd->id) !!}">{{ $hd->ma }}</a></td>
				<td>{{ $hd->tennguoidat }}</td>
				<td>{{ $hd->dienthoai }}</td>
				<td>{{ $hd->email }}</td>
				<td>{{ number_format($hd->tongtienchuathue) }}</td>
                <td>{{ number_format($hd->thue) }}</td>
				<td>{{ number_format($hd->phiship) }}</td>
			</tr>
			
			@endforeach
			<td>Tổng</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>{{ number_format($tong) }} VNĐ</td>
			<td>{{ number_format($phiship) }} VNĐ</td>
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