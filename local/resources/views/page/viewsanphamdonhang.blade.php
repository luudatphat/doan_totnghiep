
@extends('masterAdmin')
@section('content')
	<div class="row" >
		<div class="col-lg-12">
			<h1 class="page-header">Xem đơn hàng</h1>
		</div>
	</div>
		<div class="row" style="margin: 10px; float : right ;">
			<div class="col-md-12" style=" margin :30px 0px;">  
				<a href="{{route('indexAdmin')}}"><button type="button" class="btn btn-secondary" >Quay lại</button></a>
			</div>
		</div>
<div class="row" style="    margin-left: 5px;">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Mã sản phẩm</td>
					<td>Tên sản phẩm</td>
					<td>Image</td>
					<td>Số lượng </td>
					<td>Giá</td>
					<td>Tổng</td>
					<td>Phí dịch vụ</td>
					<td>Người bán</td>

				</tr>
			</thead>
			<tbody>
				@foreach($iop as $value)


				<tr>
					<td>
						{{$value->masanpham}}
					</td>
					

					<td>
						{{$value->tensanpham}}
					</td>
					<td>
						<img style="width: 100px; height: 150px;" src="images/sanpham/{{$value->avatar}}" alt="image"  title="image"  class="img-thumbnail" />				
					</td>
					<td>
						{{$value->soluong}}
					</td>
					<td>
						{{number_format($value->gia)}}
					</td>
					<td>{{number_format($value->gia*$value->soluong)}}</td>
					<td>{{number_format($value->phidichvu)}}</td>
					<?php $tennguoiban = DB::table('nguoidung')->where('id',$value->idnguoiban)->get(); ?>
					@foreach($tennguoiban as $valuee)
						<td><a href="{{route('donhang',[$valuee->id])}}">{{$valuee->ten}}</a></td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>




	<!-- Main Container Ends -->

<!-- Footer Section Ends -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>	
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-hover-dropdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
@endsection