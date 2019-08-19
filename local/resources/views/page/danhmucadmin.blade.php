@extends('masterAdmin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh mục sản phẩm</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Thêm danh mục
			</div>
			@if(Session::has('dung'))
				<div class="alert alert-success">
					{{Session::get('dung')}}
				</div>
			@endif

			@if(Session::has('sai'))
				<div class="alert alert-danger">
					{{Session::get('sai')}}
				</div>
			@endif

			@if(count($errors)>0)
				@foreach($errors->all() as $err)
				<div class="alert alert-danger">{{$err}}</div>
				@endforeach
			@endif

			<form class="form-horizontal" role="form" enctype="multipart/form-data" id="formsumit" action="{{route('danhmucadmin')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="col-sm-12" style="margin: 15px;">
					<select class="form-control trangthai" id="trangthai" name="trangthai"  >

						@foreach($loai as $value)
						<option value="{{$value->id}}" {{(old('trangthai') == $value->id) ? 'selected' : ''}}>{{$value->ten}}</option>
						@endforeach

					</select>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label>Tên danh mục:</label>
						<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." style="width: 500px;">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-black" id="dangsanpham" >
							Thêm
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách danh mục hiện có</div>
			@if(Session::has('khongxoa'))
				<div class="alert alert-danger">
					{{Session::get('khongxoa')}}
				</div>
			@endif
			@if(Session::has('xoaduoc'))
				<div class="alert alert-success">
					{{Session::get('xoaduoc')}}
				</div>
			@endif

			<div class="row">
				<form id="form_order" method="get">
					<div class="col-md-3 offset-md-3" style="float : left ; margin :30px 0px;"> 
						<select class="form-control moicu" id="giaohangtinhtrang" name="giaohangtinhtrang" style="width: 450px; height: 50px;" >
							<option {{ Request::get('giaohangtinhtrang') == "tatca" ? "selected='selected'" : "" }} value="tatca" selected="" >Tất cả</option>
							<option {{ Request::get('giaohangtinhtrang') == "dienthoai" ? "selected='selected'" : "" }} value="dienthoai" >Điện thoại</option>
							<option {{ Request::get('giaohangtinhtrang') == "laptop" ? "selected='selected'" : "" }} value="laptop" >Laptop</option>
							<option {{ Request::get('giaohangtinhtrang') == "mypham" ? "selected='selected'" : "" }} value="mypham">Mỹ phẩm</option>
						</select>
					</div>
				</form>
			</div>

			<div class="panel-body">
				
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên danh mục</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							@foreach($hang as $value)
							<tr>
								<td>{{$value->ten}}</td>
								<td>
									<a href="{!! url('Editdanhmucadmin',[$value->id]) !!}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
									<a href="{!! url('Deletedanhmucadmin',[$value->id]) !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
<script src="jsadmin/jquery-1.11.1.min.js"></script>
<script src="jsadmin/bootstrap.min.js"></script>
<script src="jsadmin/chart.min.js"></script>
<script src="jsadmin/chart-data.js"></script>
<script src="jsadmin/easypiechart.js"></script>
<script src="jsadmin/easypiechart-data.js"></script>
<script src="jsadmin/bootstrap-datepicker.js"></script>

<script type="text/javascript">



	$(function() {
		$('#giaohangtinhtrang').change(function(){

			$("#form_order").submit();
		});
	});


</script>

@endsection