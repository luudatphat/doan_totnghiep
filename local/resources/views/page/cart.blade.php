<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<![endif]-->
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<!-- <script src="{!! url('js/updatecart.js') !!}"></script> -->
</head>
<body>

<script type="text/javascript">
	

	function updateCart(qty,rowId)
	{

		 if (qty<0)
		{

			alert('không được âm');
			location.reload();
		}
		else if (qty == '')
		{
			location.reload();
		}
		else
		{
			var songuyen  = parseInt(qty);
			$.get(
				'{{route('updatecart')}}',
				{
					qty:songuyen,
					rowId:rowId
				},
				function()
				{
					location.reload();
				}
			);
		}
	}
	function updateCa(rowId,index)
	{
		
		console.log(rowId);

		var quantity = document.getElementsByClassName("quantity");
		var a = quantity[index].value;
		var songuyen  = parseInt(a);
		if (a<0)
		{

			alert('không được âm');
			location.reload();
		}	
		else if (a == '')
		{
			location.reload();
		}
		else
		{
			$.get(
				'{{route('updatecart')}}',
				{

					rowId:rowId,
					qty:songuyen
				},
				function()
				{
					location.reload();
				}
				);		
		}
	}

</script>

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
@if(Cart::count()>=1)
<!-- Main Container Starts -->
	<div id="main-container" class="container">
	<!-- Breadcrumb Starts -->
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Shopping Cart</li>
		</ol>
	<!-- Breadcrumb Ends -->
	<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Giỏ hàng
		</h2>
	<!-- Main Heading Ends -->
	<!-- Shopping Cart Table Starts -->
		<div class="table-responsive shopping-cart-table">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">
							Hình
						</td>
						<td class="text-center">
							Tên sản phẩm
						</td>							
						<td class="text-center">
							Số lượng
						</td>
						<td class="text-center">
							Giá
						</td>
						
						<td class="text-center">
							Tổng
						</td>
						<td class="text-center">
							Thao tác
						</td>
					</tr>
				</thead>
				<tbody>
					 <?php $index=0; ?>
					
					@foreach($items as $item)
					<tr>
						
						<td class="text-center">
							<a href="{!! url('chitietsanpham',$item->id) !!}">
								<img style="width: 220px; height: 200px; " src="images/sanpham/{{ $item->options->img }}" alt="Product Name" title="Product Name" class="img-thumbnail" />
							</a>
						</td>
						<td class="text-center">{{$item->name}}							
						</td>							
						<td class="text-center" style="width: 100px;">
							<div class="input-group btn-block">
								<input type="number" name="quantity" id="quantity" class="form-control quantity" value="{{$item->qty}}" size="1" 
								 onchange="updateCart(this.value,'{{$item->rowId}}')" />
							</div>								
						</td>
						@if($item->options->khuyenmai>0)
						<td class="text-center">
							
								<span style="text-decoration: line-through;">{{number_format($item->options->pricechuakm,0,',','.')}} vnd</span> 
								<span>{{number_format($item->price,0,',','.')}} vnd</span> 
							
						</td>
						
						@else
						<td class="text-center">
							{{number_format($item->price,0,',','.')}} vnd
						</td>
						@endif
							
						<td class="text-center">
							{{number_format(($item->price*$item->qty),0,',','.')}} vnd
						</td>
						<td class="text-center">
					<button type="submit" title="Update" class="btn btn-default tool-tip " onclick="updateCa('{{$item->rowId}}','{{$index++}}')">
								<i class="fa fa-refresh"></i>
							</button>
							<button type="button" title="Remove" class="btn btn-default tool-tip">
								<a href="{!! url('deletecart',[$item->rowId]) !!}"><i class="fa fa-times-circle"></i></a>
							</button>

							<!-- <button type="button" title="Remove" class="btn btn-default tool-tip">
								<a href="{!! url('deletecart/all') !!}"><i class="fa fa-times-circle">Xoahet</i></a>
							</button> -->
						</td>
					</tr>
				
					@endforeach
				</tbody>
				
			</table>				
		</div>
	<!-- Shopping Cart Table Ends -->
	<!-- Shipping Section Starts -->
		<section class="registration-area">
			<div class="row">
			<!-- Shipping & Shipment Block Starts -->
				
				<!-- Taxes Block Starts -->
					
				<!-- Taxes Block Ends -->
				<!-- Shipment Information Block Starts -->
					<!--  -->
				<!-- Shipment Information Block Ends -->
			
			<!-- Shipping & Shipment Block Ends -->
			<!-- Discount & Conditions Blocks Starts -->
				<div class="col-sm-6">
				<!-- Discount Coupon Block Starts -->
					
				<!-- Discount Coupon Block Ends -->
				<!-- Conditions Panel Starts -->
					
				<!-- Conditions Panel Ends -->
				<!-- Total Panel Starts -->
					<div class="panel panel-smart">
						
						<div class="panel-body">
							
							<dl class="dl-horizontal">
								<dt>
									<input type="radio" value="0" name="gender" id="gender" checked="" /> 5-7(ngày)
									<input type="radio" value="1" name="gender" id="genderr" /> 2-3(ngày) 
								</dt>
								<dd></dd>
								<dt>Phí giao hàng :</dt>
								<dd><div id="phigiao">{{number_format($congtongship,0,',','.')}} VND</div></dd>
								
								<dt>Tổng tiền (chưa phí giao) :</dt>
								<dd>{{number_format($subtotal,0,',','.')}} VND</dd>
							</dl>
							<hr />
							<dl class="dl-horizontal total">
								<dt>Tổng tiền :</dt>
								<dd><div id="tonggiohang">{{number_format(($subtotal+$congtongship),0,',','.')}} VND</div></dd>
							</dl>
							<hr />
							<div class="text-uppercase clearfix">
								<a href="#" class="btn btn-default pull-left">
									<span class="hidden-xs">Tiếp tục mua hàng</span>
									<span class="visible-xs">Continue</span>
								</a>
								<a class="btn btn-default pull-right" data-toggle="modal" data-target="#exampleModal">		
									ĐẶT HÀNG
								</a>
							</div>
						</div>
					</div>
				<!-- Total Panel Ends -->
				</div>
			<!-- Discount & Conditions Blocks Ends -->
			</div>
		</section>
	<!-- Shipping Section Ends -->
	</div>
<!-- Main Container Ends -->
@else
		<h2  style=" text-align: center;">Giỏ hàng</h2>
		<div style=" text-align: center;">Giỏ hàng hiện đang rỗng, xin mời bạn <a href="">đặt mua sản phẩm</div>
@endif
<!-- modal thanh toan -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="alert-danger" style="display:none"></div>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Tên người đặt :</label>

						<input type="text" class="form-control" id="ten" name="ten" placeholder="Tên người đặt" value="{{Auth::user()->ten}}">
						<p style="color:red; display: none" class="error errorTen"></p>

					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Điện thoại :</label>

						<input type="text" class="form-control" id="sdt" name="sdt" placeholder="Điện thoại" value="{{Auth::user()->sdt}}">
						<p style="color:red; display: none" class="error errorSdt"></p>

					</div>

					<div class="form-group">
						<label for="inputPhone" class="col-sm-3 control-label">Email :</label>

						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Auth::user()->email}}" >
						<p style="color:red; display: none" class="error errorEmail"></p>


					</div>
					<div class="form-group">

						<label for="inputEmail" class="col-sm-3 control-label">Số nhà :</label>

						<input type="text" class="form-control" id="sonha" name="sonha" placeholder="Số nhà">
						<p style="color:red; display: none" class="error errorSonha"></p>

					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Tên đường :</label>

						<input type="text" class="form-control" id="tenduong" name="tenduong" placeholder="Tên đường" value="Đường">
						<p style="color:red; display: none" class="error errorTenduong"></p>

					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Phường/xã :</label>

						<input type="text" class="form-control" id="phuong" name="phuong" placeholder="Phường/xã " value="Phường">
						<p style="color:red; display: none" class="error errorPhuong"></p>

					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Quận/huyện :</label>

						<input type="text" class="form-control" id="diachi" name="diachi" placeholder=" Quận/huyện" value="Quận">
						<p style="color:red; display: none" class="error errorDiachi"></p>

					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Tỉnh thành:</label>

						<input type="text" class="form-control" id="tinhthanh" name="tinhthanh" placeholder="Tỉnh thành">
						<p style="color:red; display: none" class="error errorTinhthanh"></p>

					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
				<button type="submit" class="btn btn-primary" id="submitmodan">ĐẶT HÀNG</button>
			</div>

		</div>
	</div>
</div>
<!-- End modal thanh toan -->
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
@if(Cart::count()>=1)
<script language="javascript">
	  var div = document.getElementById('phigiao');
	   var divv = document.getElementById('tonggiohang');

	document.getElementById("gender").onclick = function ()
	{
		var checkbox = document.getElementsByName("gender");
		for (var i = 0; i < checkbox.length; i++){
			if (checkbox[i].checked === true){
				div.innerHTML = '{{number_format($congtongship,0,",",".")}} VND';
				divv.innerHTML = '{{number_format(($subtotal+$congtongship),0,",",".")}} VND';
				
				
			}
		}
	};
	document.getElementById("genderr").onclick = function ()
	{
		var checkbox = document.getElementsByName("gender");
		for (var i = 0; i < checkbox.length; i++){
			if (checkbox[i].checked === true){
				div.innerHTML = '{{number_format(($congtongship*3),0,",",".")}} VND';
				divv.innerHTML = '{{number_format(($subtotal+($congtongship*3)),0,",",".")}} VND';
				
			}
		}
	};

</script>
@endif
<script type="text/javascript">
    $(function() {
		$('#submitmodan').click(function(e){
			e.preventDefault();
			 var x = document.getElementById("gender").checked;
			   if(x == true)
			   {
			   	var phigiao = 0;
			   }
			   else
			   {
			   	var phigiao = 1;
			   	
			   }
		
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				'url':'{{route('paycart')}}',			
				'data':{
					'ten' : $('#ten').val(),
					'sdt' : $('#sdt').val(),
					'email' : $('#email').val(),
					'sonha' : $('#sonha').val(),
					'tenduong' : $('#tenduong').val(),
					'phuong' : $('#phuong').val(),
					'diachi' : $('#diachi').val(),
					'tinhthanh' : $('#tinhthanh').val(),
					'phigiao' : phigiao,

				},
				'type' : 'POST',
				success: function(data){
					console.log(data);
					if (data.error ==true)
					{
						$('.error').hide();
						if (data.message.ten != undefined) {
							$('.errorTen').show().text(data.message.ten[0]);
						}
						if (data.message.sdt != undefined) {
							$('.errorSdt').show().text(data.message.sdt[0]);
						}
						if (data.message.email != undefined) {
							$('.errorEmail').show().text(data.message.email[0]);
						}
						if (data.message.sonha != undefined) {
							$('.errorSonha').show().text(data.message.sonha[0]);
						}
						if (data.message.tenduong != undefined) {
							$('.errorTenduong').show().text(data.message.tenduong[0]);
						}
						if (data.message.phuong != undefined) {
							$('.errorPhuong').show().text(data.message.phuong[0]);
						}
						if (data.message.diachi != undefined) {
							$('.errorDiachi').show().text(data.message.diachi[0]);
						}
						if (data.message.tinhthanh != undefined) {
							$('.errorTinhthanh').show().text(data.message.tinhthanh[0]);
						}
					}
					else
					{	
						if(phigiao == 1 )
						{
						window.location = "{!! url('paycart',[1]) !!}";
						}
						else
						{
							window.location = "{!! url('paycart',[0]) !!}";
						}
					}

				}

			});
		});

	});
</script>