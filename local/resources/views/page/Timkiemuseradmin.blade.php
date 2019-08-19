@extends('masterAdmin')
@section('content')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản Lý hóa đơn</h1>
			</div>
		</div><!--/.row-->

		 <div class="col-md-4 offset-md-4" style="float : right ; margin :5px 0px;">  
                <h2>Tìm kiếm </h2>
	        	<form class="input-group" method="get" action="{{ route('timkiemuseradmin') }}">
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
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">TÊN ĐĂNG NHẬP</th>
							<th scope="col">TÊN NGƯỜI DÙNG</th>
							<th scope="col">SỐ ĐIỆN THOẠI</th>
							<th scope="col">EMAIL</th>
							<th scope="col">TÊN SHOP</th>
							<th scope="col">AVATAR</th>

						</tr>
					</thead>
					<tbody>
					@foreach($nguoidung as $value)
					
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->username}}</td>
							<td>{{$value->ten}}</td>
							<td>{{$value->sdt}}</td>
							<td>{{$value->email}}</td>
							<td>{{$value->tenshop}}</td>
							<td>
								<img style="width: 100px; height: 150px;" src="images/user/{{$value->avatar}}" alt="image"  title="image"  class="img-thumbnail" />				
							</td>

						</tr>
						@endforeach

						 
					</tbody>
				</table>
					<?php if(isset($_GET['key']))
			{ 
				$key =  $_GET['key'];
				
				} ?>

                            <div class="col-md-9">

                            <?php if(isset($key))
                            {
                                ?>
                                <div style="text-align:center;">{!! $nguoidung->appends(['key' => $key])->links() !!}</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div style="text-align:center;">{!! $nguoidung->links() !!}</div>
                                <?php
                            }
                            ?>
                        </div>
			</div>
			<!--/.col-->
		</div><!--/.row-->
		@endsection
