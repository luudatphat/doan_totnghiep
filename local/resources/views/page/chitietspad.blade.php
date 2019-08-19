@extends('masterAdmin')
@section('content')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi tiết sản phẩm</h1>
			</div>
		</div><!--/.row-->
									

		
		<div class="row">
			<div class="col-md-12">
			
			@foreach($sanpham as $sp)
				<div>Tên sản phẩm : {{$sp->ten}} </div>
				<div>Ảnh đại diện : <img  style="height: 300px;"  src="images/sanpham/{{ $sp->avatar }}"  alt="Image" class="img-responsive thumbnail" /></div>
				<div>Ảnh chi tiết:
				<?php $hinhanh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
				<ul class="list-unstyled list-inline">
				@foreach($hinhanh as $ha)
					<li>
						<a>
							<img  style="width: 220px; height: 250px;"  src="images/sanpham/{{ $ha->img }}" alt="Image" class="img-responsive thumbnail" />
						</a>
					</li>
						
				@endforeach
				</ul> 
				</div>
				<div class="price">
					<?php $gia = number_format($sp->gia);?>

					@if($sp->khuyenmai>0)	
						<div class="price">
							<span class="price-head" >Giá :</span><span class="price-old" style="text-decoration: line-through;">{{ $gia }} VNĐ</span>
							<span  class="price-new">{{ number_format($sp->giakm) }} VNĐ</span> 
							

						</div>
						<div class="description" style="color: red;">
							Khuyến mãi {{$sp->khuyenmai}}%
						</div>
					@else
						<span class="price-head">Giá :</span>
						<span class="price-new">{{ $gia }} VNĐ</span> 
					@endif
				<div>Mô tả : <span>{{$sp->mota}}</span></div>
				<div>Thông số : <span><?php
							if ($sp->idloai==1) {
							 	$thongso = DB::table('thongso')->join('tsdienthoai','thongso.id','tsdienthoai.idthongso')->where('idsanpham',$sp->id)->get();
							 	?>
							 	@foreach($thongso as $ts)
								 	<br>
						 			<span>Camera trước : </span>{{ $ts->cameratruoc }}MP<br>
						 			<span>Camera sau : </span>{{ $ts->camerasau }}MP<br>
						 			<span>Dung lượng : </span>{{ $ts->bonhotrong }}GB<br>
						 		@endforeach 
							 	 <?php
							 }
							 if ($sp->idloai==2) {
								$thongso = DB::table('thongso')->join('tslaptop','thongso.id','tslaptop.idthongso')->where('idsanpham',$sp->id)->get();
							 	?>
								@foreach($thongso as $ts)
									<br>
						 			<span>Hệ điều hành : </span>{{ $ts->hedieuhanh }}<br>
						 			<span>CPU : </span>{{ $ts->cpu }}<br>
						 			<span>Ram : </span>{{ $ts->ram }}GB<br>
									<span>Ổ cứng : </span>{{ $ts->ocung }}GB<br>
									<span>Màn hình : </span>{{ $ts->manhinh }}inch<br>
									<span>Card đồ họa : </span>{{ $ts->carddohoa }}<br>
									<span>Pin : </span>{{ $ts->pin }} tiếng<br>
									<span>Trọng lượng : </span>{{ $ts->trongluong }}Kg<br>

						 		@endforeach
							
							<?php
							 }
							 if ($sp->idloai==3) {
								$thongso = DB::table('thongso')->join('tsmypham','thongso.id','tsmypham.idthongso')->where('idsanpham',$sp->id)->get();
							 	?>
								@foreach($thongso as $ts)
								    <br>
						 			<span>Xuất xứ : </span>{{ $ts->xuatxu }}<br>
						 			<span>Trọng lượng : </span>{{ $ts->trongluong }}g<br>

						 		@endforeach
						     <?php } ?></span>
				</div>
				<button type="button" class="btn">
                                <i class="fa fa-edit"><a style="color: black" href="{!! url('duyetsp',$sp->id) !!}">Duyệt</a></i>	
							</button>
                            <button type="button" class="btn">
                                <i class="fa fa-trash"></i><a style="color: black" href="{!! url('xoaspad',$sp->id) !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" >Xóa</a></i>
							</button> 
				@endforeach
								
		<!-- Tab Content Ends -->

		</div>	

		
					
					

				
			
				
			
		</div><!--/.row-->
		@endsection
