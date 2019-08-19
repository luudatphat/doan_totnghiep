@extends('masterAdmin')
@section('content')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý thành viên</h1>
			</div>
			<div>
			@if(Session::has('thanhcong'))
				<div class="alert alert-success">
					{{Session::get('thanhcong')}}
				</div>
			@endif
			</div>
		</div><!--/.row-->

		 <div class="col-md-4 offset-md-4" style="float : right ; margin :5px 0px;">  
                <h2>Tìm kiếm </h2>
	        	<form class="input-group" method="get" action="{{ route('quanlyuseradmin') }}">
	        		<input style="font-family:Times New Roman;" type="text" class="form-control input-lg" name="key" placeholder="Nhập số ID hoặc tên người dùng">
	        		<span class="input-group-btn">
	        			<button class="btn btn-lg" type="submiT">
	        				Tìm
	        			</button>
	        		</span>

	        	</form>
	        </div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover">
					<tr>
                        <td>Tên shop</td>
                        <td>{{$nguoidung->tenshop}}</td>
                    </tr>
					<tr>
                        <td>Số chứng minh dân nhân</td>
                        <td>{{$nguoidung->cmnd}}</td>
                    </tr>
					<tr>
                        <td style="text-align:center;">Ảnh chứng minh dân nhân</td>
                        <td><img src="images/nguoidung/{{$nguoidung->anhcmnd}}" alt="image"  title="image"  class="img-thumbnail" /></td>
                    </tr>
					<tr>
                        <td>Thao tác</td>
                        <td>
							<button type="button" class="btn">
                                <i class="fa fa-edit"><a style="color: black" href="{!! url('duyettv',$nguoidung->id) !!}">Duyệt</a></i>	
							</button>
							<button type="button" class="btn">
                                <i class="fa fa-trash"></i><a style="color: black" href="{!! url('xoatv',$nguoidung->id) !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" >Xóa</a></i>
							</button>
						</td>
                    </tr>
						 
					</tbody>
				</table>
				
			</div>
			<!--/.col-->
		</div><!--/.row-->
		@endsection
