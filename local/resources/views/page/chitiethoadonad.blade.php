
@extends('masterAdmin')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->
	@if(isset($mahd))
        @foreach($mahd as $ma)
        <h2 class="product-head">Chi tiết hóa đơn : {{$ma->ma}}</h2>
        @endforeach 
    @endif
    @if(isset($cthd))
	<div>
        <table width=100%;>
            <tr>
                <td width=20%;>Tên sản phẩm</td>
                <td width=30%;>Hình ảnh</td>
                <td width=20%;>Đơn giá</td>
                <td width=10%;>Số lượng</td>
            </tr>
            <tr>
                @foreach($cthd as $ct)
                <td>{{$ct->tensanpham}}</td>
                <td><img style="width: 10%; height: 10%;" src="images/sanpham/{{ $ct->avatar }}" /></td>
                <td>{{$ct->gia}}</td>
                <td>{{$ct->soluong}}</td>
                @endforeach
            </tr>
        </table>
	</div>
	@elseif(isset($cthd)==0)
	<div>Không có dữ liệu cho ngày thống kê vừa nhập</div>
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