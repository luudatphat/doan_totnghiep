
@extends('masterAdmin')
@section('content')
	<div class="row" >
		<div class="col-lg-12">
			<h1 class="page-header">Thông tin người mua</h1>
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
						<td>Tên tài khoản đặt</td>
						<td>Tên người nhận</td>
						<td>Điện thoại</td>
						<td>Email</td>
						<td>Địa chỉ </td>
						<td>Ngày đặt</td>
						<td>Ngày dự kiến giao</td>
						
					</tr>
				</thead>
				<tbody>
				
	

					<tr>
						
						<td>{{$iop['tennguoidung']}}</td>
						<td>
							{{$iop['tennguoidat']}}
						</td>
						<td>
							{{$iop['dienthoai']}}			
						</td>
												
						<td>
							{{$iop['email']}}
						</td>
						<td>
							{{$iop['diachi']}}
						</td>
						<td>
							{{$iop['created_at']}}
						</td>
						<td>
							{{$iop['ngaydukiengiao']}}
						</td>
						
					</tr>
					
				</tbody>
			</table>

	</div>
</div>



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
@endsection