
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
			<li class="active">Đăng nhập</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Đăng nhập hoặc tạo một tài khoản mới
		</h2>
	<!-- Main Heading Ends -->
	<!-- Login Form Section Starts -->
		<section class="login-area">
			<div class="row">
				<div class="col-sm-6">
				<!-- Login Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">Đăng nhập</h3>
						</div>
						<div class="panel-body">
							<p>
								Vui lòng nhập tài khoản sử dụng.
							</p>
						<!-- Login Form Starts -->
							<form class="form-inline" method="post"  action="{{route('login')}}"" role="form">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								@if(Session::has('err'))
								<div class="alert alert-danger">
									{{Session::get('err')}}
								</div>
								@endif
								@if(count($errors)>0)
								
									@foreach($errors->all() as $err)

									<div class="alert alert-danger">{{$err}}</div>
									@endforeach
								
								@endif
								@if(Session::has('dung'))
								<div class="alert alert-success">
									{{Session::get('dung')}}
								</div>
								@endif
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">Tên đăng nhập</label>
									<input type="text" class="form-control" name="username" id="exampleInputEmail2" placeholder="Tên đăng nhập">
								<!-- 	@if($errors->has('username'))
											<p style="color: red"> {{$errors->first('username')}}</p>
									@endif -->
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputPassword2">Password</label>
									<input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Mật khẩu">
									<!-- @if($errors->has('password'))
											<p style="color: red"> {{$errors->first('password')}}</p>
									@endif -->
								</div>
								
								<button type="submit" class="btn btn-black">
									Đăng nhập
								</button>
							</form>

						<!-- Login Form Ends -->
						</div>
					</div>
					


					<a href="{!! url('quenmatkhau') !!}"><button type="button" class="btn btn-black">
									Quên mật khẩu
								</button></a>
								<a href="google" class="btn btn-danger">
									Đăng nhập bằng google
								</a>
				<!-- Login Panel Ends -->
				</div>

				<div class="col-sm-6">
				<!-- Account Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Tạo tài khoản mới
							</h3>
						</div>
						<div class="panel-body">
							<p>
								Đăng ký giúp bạn có thể mua hàng và đặt hàng ở Website Tipe
							</p>
							<a href="register" class="btn btn-black">
								Đăng Kí Ngay
							</a>
						</div>
					</div>
				<!-- Account Panel Ends -->
				
				</div>
			</div>
		</section>
	<!-- Login Form Section Ends -->
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