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
			<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
			<li class="active">Thông tin</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Thông tin <br />
			<span></span>
		</h2>
	<!-- Main Heading Ends -->
	<!-- Registration Section Starts -->
	@if(Auth::check())
		<section class="registration-area">
			<div class="row">
				<div class="col-sm-6">
				<!-- Registration Block Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin người dùng</h3>
						</div>
						<div class="panel-body">
						<!-- Registration Form Starts -->
							<form class="form-horizontal"  method="post" action="{{route('information')}}" role="form" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								@if(Session::has('thanhcong'))
								<div class="alert alert-success">
									{{Session::get('thanhcong')}}
								</div>
								@endif
								@if(Session::has('erro'))
								<div class="alert alert-danger">
									{{Session::get('erro')}}
								</div>
								@endif
								@if(count($errors)>0)
								
									@foreach($errors->all() as $err)

									<div class="alert alert-danger">{{$err}}</div>
									@endforeach
								
								@endif

								
							<!-- Personal Information Starts -->
								<div class="form-group">
									<label for="inputFname" class="col-sm-3 control-label">Tên tài khoản :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Tên tài khoản" value="{{Auth::user()->username}}" readonly="">
									</div>
								</div>
								<!-- <div class="form-group">
									<label for="inputLname" class="col-sm-3 control-label">Password :</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
									</div>
								</div> -->
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Điện thoại :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputPhone" name="sdt" placeholder="Điện thoại" value="{{Auth::user()->sdt}}">
										@if($errors->has('sdt'))
											<p style="color: red"> {{$errors->first('sdt')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Tên người dùng :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputPhone" name="ten" placeholder="Tên người dùng" value="{{Auth::user()->ten}}">
										@if($errors->has('ten'))
									<p style="color: red"> {{$errors->first('ten')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Email :</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{Auth::user()->email}}" readonly="">
										
									</div>

								</div>
								@if(Auth::user()->shop == 1)
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Tenshop :</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputPhone" name="tenshop" placeholder="Tenshop" value="{{Auth::user()->tenshop}}">
											@if($errors->has('tenshop'))
										<p style="color: red"> {{$errors->first('tenshop')}}</p>
											@endif
										</div>	
								
								</div>
								@else
									<input type="hidden" class="form-control" id="inputPhone" name="tenshop" placeholder="Tenshop" value="{{Auth::user()->tenshop}}">
								@endif
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Ảnh đại diện :</label>
									<div class="col-sm-9">
										<input type="file" class="form-control" id="inputimg" name="myFile" placeholder="Hình ảnh" id="myFile" >
										@if($errors->has('myFile'))
										<p style="color: red"> {{$errors->first('myFile')}}</p>
										@endif
									</div>


								</div>
								
							<!-- Personal Information Ends -->
								
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-black">
											Sửa
										</button>
									</div>
									
								</div>
								

								



							</form>
						<!-- Registration Form Starts -->
						</div>							
					</div>
				<!-- Registration Block Ends -->
						<a href="{{route('hoadon')}}"><button type="button" class="btn btn-secondary" >Đơn đặt hàng</button></a>
						<a href="{{route('doimkinformatiom')}}"><button type="button" class="btn btn-secondary" >Đổi mật khẩu</button></a>
				</div>
				<div class="col-sm-6" style="width: 300px">
								<!-- Account Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
											Ảnh đại diện
							</h3>
						</div>
						<div class="panel-body">
							<div class="image">
								<img style="width: 220px; height: 250px;" src="images/user/{{ Auth::user()->avatar }}" alt="product" class="img-responsive" />
							</div>

						</div>
					</div>
				</div>
				
				<!-- Guest Checkout Panel Starts -->
					
				<!-- Guest Checkout Panel Ends -->
				<!-- Conditions Panel Starts -->
					
				<!-- Conditions Panel Ends -->
				
			</div>
		</section>
		@endif
	<!-- Registration Section Ends -->
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
