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
		
			<li class="active">Quên mật khẩu</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Quên mật khẩu <br />
			<span></span>
		</h2>
	<!-- Main Heading Ends -->
	<!-- Registration Section Starts -->

		<section class="registration-area">
			<div class="row">
				<div class="col-sm-6">
				<!-- Registration Block Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">Đổi mật khẩu</h3>
						</div>

						@if(count($errors)>0)

							@foreach($errors->all() as $err)

								<div class="alert alert-danger">{{$err}}</div>
							@endforeach

						@endif
						@if(Session::has('sai'))
							<div class="alert alert-danger">
								{{Session::get('sai')}}
							</div>
						@endif
						@if(Session::has('quathoigian'))
							<div class="alert alert-danger">
								{{Session::get('quathoigian')}}
							</div>
						@endif

						@if(Session::has('dung'))
							<div class="alert alert-success">
								{{Session::get('dung')}}
							</div>
						@endif
						<div class="panel-body">
						<!-- Registration Form Starts -->
							<form class="form-horizontal"  method="post" action="{{route('quenmatkhau')}}" role="form" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
							<!-- Personal Information Starts -->
							<!-- 	<div class="form-group">
									<label for="inputFname" class="col-sm-3 control-label">Tên đăng nhập:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control"  name="tendangnhap" placeholder="Tên đăng nhập" >
									</div>
								</div> -->
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Email:</label>
									<div class="col-sm-9">
										<input type="email" class="form-control"  name="email" placeholder="Email" >
										
									</div>
								</div>
							<!-- Personal Information Ends -->
								
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-black">
											Gửi email
										</button>
									</div>
									
								</div>
															
							</form>
						<!-- Registration Form Starts -->
						</div>							
					</div>
				<!-- Registration Block Ends -->
						<a href="{{route('login')}}"><button type="button" class="btn btn-secondary" >Quay lại</button></a>
						
				</div>
				
				
			</div>
		</section>
		
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
