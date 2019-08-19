@extends('masterAdmin')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Bình luận sản phẩm</h1>
	</div>
</div>
	<div class="row">
		<div class="col-sm-8">
			@if(Session::has('dung'))
			<div class="alert alert-success">
				{{Session::get('dung')}}
			</div>
			@endif
		</div>
	</div>
<div class="row">
	<div class="col-sm-12">
		
		<table class="table table-hover table-dark">
		  <thead>
		  	<?php $i =0;?>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col">Tên người bình luận</th>
		      <th scope="col">Nội dung</th>
		       <th scope="col">Đánh giá</th>
		        <th scope="col">Ngày bình luận</th>
		        <th scope="col">Thao tác</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($binhluan as $value)
		    <tr>
		      <th scope="row">{{$i}}</th>
		      <td>{{$value->tensanpham}}</td>
		      <td>{{$value->tennguoidung}}</td>
		      <td>{{$value->binhluan}}</td>
		       <td>{{$value->danhgia}}</td>
		        <td>{{$value->created_at}}</td>
		        <td><a href="{!! url('DeletedanhgiaAdmin',[$value->id]) !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a></td>    
		    </tr>
		   <?php $i++; ?>
		  @endforeach
		  </tbody>
		</table>
	</div>
</div>
   <div style="text-align:center;">{!! $binhluan->links() !!}</div>
@endsection