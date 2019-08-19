<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="cssadmin/bootstrap.min.css" rel="stylesheet">
<link href="cssadmin/datepicker3.css" rel="stylesheet">
<link href="cssadmin/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Đăng nhập Quản trị</div>
				<div class="panel-body">
					<form method="post"  action="{{route('loginadmin')}}"" role="form">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							@if(Session::has('err'))
								<div class="alert alert-danger">
									{{Session::get('err')}}
								</div>
								@endif
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Tên đăng nhập" name="username" type="username" autofocus="">
								@if($errors->has('username'))
									<p style="color: red"> {{$errors->first('username')}}</p>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
								@if($errors->has('password'))
									<p style="color: red"> {{$errors->first('password')}}</p>
								@endif
							</div>
						<!-- 	<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<button type="submit" class="btn btn-primary">
									Đăng nhập
								</button>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="jsadmin/jquery-1.11.1.min.js"></script>
	<script src="jsadmin/bootstrap.min.js"></script>
	<script src="jsadmin/chart.min.js"></script>
	<script src="jsadmin/chart-data.js"></script>
	<script src="jsadmin/easypiechart.js"></script>
	<script src="jsadmin/easypiechart-data.js"></script>
	<script src="jsadmin/bootstrap-datepicker.js"></script>
	<script>
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
