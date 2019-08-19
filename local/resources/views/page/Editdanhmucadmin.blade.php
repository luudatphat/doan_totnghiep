@extends('masterAdmin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh mục sản phẩm</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				@if($hang[0]['idloai'] == 1)
					Sửa danh mục hãng điện thoại
				@elseif($hang[0]['idloai'] == 2)
					Sửa danh mục hãng  Laptop
				@else
					Sửa danh mục hãng  Mỹ phẩm
				@endif
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
			<form class="form-horizontal" role="form" action="{{route('Editdanhmucadmin')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			
				<input type="hidden" name="id" value="{{$hang[0]['id']}}">

				<div class="col-sm-8" style="margin: 15px;">
					<select class="form-control trangthai" id="trangthai" name="trangthai"  >

						
						<option value="1" @if($hang[0]['idloai'] == 1) selected="" @endif>Điện thoại</option>
						<option value="2" @if($hang[0]['idloai'] == 2) selected="" @endif>Lap top</option>
						<option value="2" @if($hang[0]['idloai'] == 3) selected="" @endif>Mỹ phẩm</option>
						

					</select>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-9">Tên danh mục:</label>
						<div class="col-sm-9">
						<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." style="width: 300px;" value="{{$hang[0]['ten']}}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9" style="margin-bottom: 20px;">
						<button type="submit" class="btn btn-black" id="dangsanpham"  style="    background: #337ab7;  color: white;">
							SỬA
						</button>
					</div>
				</div>

			</form>
		

			
		</div>
	</div>
</div>
		@endsection
