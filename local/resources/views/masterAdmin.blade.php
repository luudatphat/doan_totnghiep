<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tipe</title>
<base href="{{asset('')}}">
<link href="cssadmin/bootstrap.min.css" rel="stylesheet">
<link href="cssadmin/datepicker3.css" rel="stylesheet">
<link href="cssadmin/styles.css" rel="stylesheet">

<script src="jsadmin/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Tipe Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Chào bạn :{{Auth::guard('admins')->user()->username}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{route('logoutadmin')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li><a href="{{route('indexAdmin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> QUẢN LÝ ĐƠN ĐẶT HÀNG</a></li>
			<li><a href="{{route('indexsanphamAdmin')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> QUẢN LÝ SẢN PHẨM</a></li>
			<li><a href="{{route('quanlyuseradmin')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> QUẢN LÝ THÀNH VIÊN</a></li>
			<li><a href="{{route('danhmucadmin')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> QUẢN LÝ DANH MỤC</a></li>
			<li><a href="{{route('thongkead')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> QUẢN LÝ THỐNG KÊ</a></li>
			<li><a href="{{route('danhgiaAdmin')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>QUẢN LÝ ĐÁNH GIÁ</a></li>
			<li role="presentation" class="divider"></li>

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			@yield('content')
		</div><!--/.row-->
	</div>	<!--/.main-->
		  

	<script src="jsadmin/jquery-1.11.1.min.js"></script>
	<script src="jsadmin/bootstrap.min.js"></script>
	<script src="jsadmin/chart.min.js"></script>
	<script src="jsadmin/chart-data.js"></script>
	<script src="jsadmin/easypiechart.js"></script>
	<script src="jsadmin/easypiechart-data.js"></script>
	<script src="jsadmin/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
				$(this).find('em:first').toggleClass("glyphicon-minus");      
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
</script>	
</body>

</html>
