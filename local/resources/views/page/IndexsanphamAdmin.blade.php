@extends('masterAdmin')
@section('content')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản Lý sản phẩm</h1>
			</div>
		</div><!--/.row-->
									

		
		<div class="row">
			<div class="col-md-12">
			@if(isset($sanpham))
			<button type="button" class="btn" >
                                <i class="fa fa-edit"><a style="color: black" href="{!! url('duyettatca') !!}">Duyệt tất cả</a></i>	
			</button>
			@endif
			@if(isset($thongbao))
			<div class="alert alert-success">
				{{$thongbao}}
			</div>
			@endif
			@if(isset($sanpham))
			
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Hình ảnh</th>
							<th scope="col">Giá</th>
							<th scope="col">Thao tác</th>

						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($sanpham as $sp)
						<tr>
							<th scope="row"><a href="{!! url('chitietspad',$sp->id) !!}"><?php echo $i++ ; ?></a></th>
							<td><a href="{!! url('chitietspad',$sp->id) !!}">{{$sp->ten}}</a></td>
							<td>
								<?php $hinhanh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
								<img style="width: 10%; height: 10%;" src="images/sanpham/{{ $sp->avatar }}" />
								@foreach($hinhanh as $ha)
								<img style="width: 10%; height: 10%;" src="images/sanpham/{{ $ha->img }}" />
								@endforeach
							</td>
							<td>{{$sp->gia}}</td>
							<td>
							<button type="button" class="btn">
                                <i class="fa fa-edit"><a style="color: black" href="{!! url('duyetsp',$sp->id) !!}">Duyệt</a></i>	
							</button>
                            <button type="button" class="btn">
                                <i class="fa fa-trash"></i><a style="color: black" href="{!! url('xoaspad',$sp->id) !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" >Xóa</a></i>
							</button>
							</td>
							
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div><!--/.col-->
			@endif
		</div><!--/.row-->
		@endsection
