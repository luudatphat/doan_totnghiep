<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Tipe</title>
	<base href="{{asset('')}}">
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Google Web Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400" rel="stylesheet" type="text/css">
	
	<!-- CSS Files -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	
	<!--[if lt IE 9]>
		<script src="js/ie8-responsive-file-warning.js"></script>
	<![endif]-->
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/fav-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/fav-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/fav-72.png">
	<link rel="apple-touch-icon-precomposed" href="images/fav-57.png">
	<link rel="shortcut icon" href="images/fav.png">
	
</head>
<body>
<!-- Header Section Starts -->
<header id="header-area">
	<!-- Header Top Starts -->
	@include('header')
	<!-- Header Top Ends -->
	<!-- Main Header Starts -->
		<div class="main-header">
			<div class="container">
				<div class="row">
				<!-- Search Starts -->
					
				<!-- Search Ends -->
				<!-- Logo Starts -->
					@include('logo')
					@include('search')
				<!-- Logo Starts -->				
				<!-- Shopping Cart Starts -->
					@include('cart')
				<!-- Shopping Cart Ends -->
				</div>
			</div>
		</div>
	<!-- Main Header Ends -->
	<!-- Main Menu Starts -->
		<nav id="main-menu" class="navbar" role="navigation">
			<div class="container">
			<!-- Nav Header Starts -->
				<div class="navbar-header">
					<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
				</div>
			<!-- Nav Header Ends -->
			<!-- Navbar Cat collapse Starts -->
				
					@include('menumain')
				
			<!-- Navbar Cat collapse Ends -->
			</div>
		</nav>
	<!-- Main Menu Ends -->
	</header>

<!-- Header Section Ends -->
	
<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Đơn đặt hàng</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Đơn đặt hàng <br />
			<span></span>
		</h2>
		@if(count($iop)>0)
		<?php $i = 0 ;?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Mã đơn đặt hàng</th>
					<th scope="col">Tên người đặt </th>
					<th scope="col">Tổng tiền</th>
					<th scope="col">Ngày đặt</th>
					<th scope="col">Ngày dự kiến giao</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@foreach($iop as $value)
				<tr>
					<th scope="row"><?php echo $i++; ?></th>
					<td ><a href="{{route('dondathanginformation',[$value->id])}}">{{$value->ma}}</a></td>

					<td><a href="{{route('tennguoidatinformation',[$value->id])}}">{{$value->tennguoidat}}</a></td>
					
					<td>{{number_format($value->tongtien,0,',','.')}} vnd</td>
					
					<td>{{$value->created_at}}</td>
					<td>{{$value->ngaydukiengiao}}</td>
					@if($value->trangthai==3)
					<td>Đơn hàng đã bị hủy</td>	
					<td>Đơn hàng đã bị hủy</td>	
					@else
						@if($value->xuly==0)
							<td>Đang đợi xử lý</td>
							<td>
								<button type="button" title="Remove" class="btn btn-default tool-tip"  >
									<a href="{{route('deletedonhang',[$value->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" ><i class="fa fa-times-circle"></i></a>
								</button>
							</td>

						@else

							@if($value->trangthai==0)
								<td>Đang Lấy hàng</td>
								<td>
									<!-- <button type="button" title="Remove" class="btn btn-default tool-tip"  >
										<a href="{{route('deletedonhang',[$value->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" ><i class="fa fa-times-circle"></i></a>
									</button> -->
									
								</td>
							@elseif($value->trangthai==1)
								<td>Đang giao</td>	
								<td></td>						
							@else
								<td>Đã giao</td>
								<td></td>	
							@endif

						@endif
					@endif


				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p><b>Hiện chưa có đơn hàng nào</b></p>
		@endif
	<!-- Main Heading Ends -->
	<!-- Registration Section Starts -->
	</div>

<!-- Main Container Ends -->
@include('footer')
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
