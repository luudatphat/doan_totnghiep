@extends('master')
@section('content')
	
			<div class="col-md-9">

			<!-- Breadcrumb Starts -->
			@if(isset($sanpham))
				@foreach($sanpham as $sp)
				<div class="col-md-12">
				<br>
				<a>
					<img class="thumbnail" style="height: 300px;"  src="images/sanpham/{{ $sp->avatar }}"  alt="Image" class="img-responsive thumbnail" />
				</a>
				<?php $hinhanh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
				<ul class="list-unstyled list-inline">
				@foreach($hinhanh as $ha)
					<li>
						<a>
							<img classe="thumbnail" style="width: 220px; height: 250px;"  src="images/sanpham/{{ $ha->img }}" alt="Image" class="img-responsive thumbnail" />
						</a>
					</li>
						
				@endforeach
				</ul>
			</div>
					<div class="col-md-12 product-details">
				<div class="panel-smart">
				<!-- Product Name Starts -->
					<h2>{{ $sp->ten }}</h2>
				<!-- Product Name Ends -->
					<hr/>
				<!-- Manufacturer Starts -->
				<!-- Price Starts -->
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

						
					</div>
				<!-- Price Ends -->
					<hr />
					<h2>
						<div class="cart-button button-group">
								<a style="color: black" href="{!! url('giohang',[$sp->id]) !!}"><button type="button" class="btn btn-cart" style="background-color: #4bac52;
    border-color: #4bac52;">
								Thêm vào giỏ hàng
								<i class="fa fa-shopping-cart"></i> 
							</button></a>								
						</div>
					</h2>
				<!-- Product Name Ends -->
					<hr/>
				<!-- Available Options Starts -->
					
				<!-- Available Options Ends -->
				</div>
			</div>
				
		<div class="tabs-panel panel-smart">
		<!-- Nav Tabs Starts -->
			<ul class="nav nav-tabs" >
				<li >
					<a href="#tab-description">Mô tả</a>
				</li>
				<li>
					<a href="#tab-thongso">Thông số</a>
				</li>
				
			</ul>
		<!-- Nav Tabs Ends -->
		<!-- Tab Content Starts -->
			<div class="tab-content clearfix">
			<!-- Description Starts -->
				<div class="tab-pane active" id="tab-description">
					<p>
						{{ $sp->mota }}
					</p>
				</div>

			<!-- Description Ends -->
			<!-- Specification Starts -->
				<div class="tab-pane" id="tab-thongso">
					<div class="tab-pane active" id="tab-description">
					<p>
						<?php
							if ($sp->idloai==1) {
							 	$thongso = DB::table('thongso')->join('tsdienthoai','thongso.id','tsdienthoai.idthongso')->where('idsanpham',$sp->id)->get();
							 	?>
							 	@foreach($thongso as $ts)
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
						 			
						 			<span>Xuất xứ : </span>{{ $ts->xuatxu }}<br>
						 			<span>Trọng lượng : </span>{{ $ts->trongluong }}g<br>

						 		@endforeach
						     <?php } ?>
						 

					</p>
				</div>
				</div>

			
				
		
			</div>
		<!-- Tab Content Ends -->

		</div>
		<?php $tenshop = DB::table('nguoidung')->where('id',$sp->idnguoidung)->get();?>
		@foreach($tenshop as $ten)
		<h3>Sản phẩm tại shop : <a href="{!! url('sanphamshop',$ten->id) !!}">{{$ten->tenshop}}</a></h3>
		@endforeach
		@if(Auth::check())
			<div class="col-md-12 product-details">
				<div class="panel-smart"  style=" margin-top: 20px; ">
					

					<div class="tab-pane active" id="tab-description">
						<h4>Viết bình luận..<span class="glyphicon glyphicon-pencil"></span></h4>
						@if(Session::has('dung'))
							<div class="alert alert-success">
								{{Session::get('dung')}}
							</div>
						@endif
						<form action="{{route('binhluan')}}" role="form" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="idsanpham" value="{{$sp->id}}">
							<input type="hidden" name="tensanpham" value="{{$sp->ten}}">


							<div class="form-group">
								<textarea class="form-control" rows="3" placeholder="Bình luận sản phẩm" name="binhluan"></textarea>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label ratings">Đánh giá</label>
								<div class="col-sm-10">
									Không Tốt&nbsp;
									<input type="radio" name="rating" value="1"  title="Không tốt"/>
									&nbsp;
									<input type="radio" name="rating" value="2"  title="Tạm được"/>
									&nbsp;
									<input type="radio" name="rating" value="3"  title="Bình thường" />
									&nbsp;
									<input type="radio" name="rating" value="4"  title="Tốt"/>
									&nbsp;
									<input type="radio" name="rating" value="5"  checked=""  title="Rất tốt"/>
									&nbsp;Rất tốt
								</div>
							</div>
							<div class="form-group" style="margin-top: 50px;">

									<button type="Submit" class="btn btn-primary" style="background-color: #4bac52; border-color: #4bac52;" >Gửi</button>
								

							</div>

						</form>
					</div>
				</div>
			</div>	
			@endif
		@if(count($binhluan)>0)
			<div class="row ">
				<div class="col-md-12 " style=" margin-top: 25px;    margin-bottom: 50px;">
						 @foreach($binhluan as $value)
							<div class="col-md-10" style="font-weight: bold;">
								{{$value->tennguoidung}} : 	đánh giá sản phẩm 

								@if($value->danhgia==5)
								
									<span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star"  style="color:#4bac52"></span><span class="glyphicon glyphicon-star"  style="color:#4bac52"></span><span class="glyphicon glyphicon-star"  style="color:#4bac52"></span><span class="glyphicon glyphicon-star"  style="color:#4bac52"></span>
								
								@elseif($value->danhgia==4)
								
									
									<span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star" style="color:#4bac52"></span>
								
								@elseif($value->danhgia==3)
								
										<span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star" style="color:#4bac52"></span>
								
								@elseif($value->danhgia==2)
								
									<span class="glyphicon glyphicon-star" style="color:#4bac52"></span><span class="glyphicon glyphicon-star" style="color:#4bac52"></span>
								
								@else
								
										<span class="glyphicon glyphicon-star" style="color:#4bac52"></span>
								
								@endif
							

								
							</div>
							<div class="col-md-10" style="margin-left: 20px;" >
									<p>{{$value->binhluan}}</p>
							</div>
							<div class="col-md-10" style=" font-style: italic;">
								Ngày bình luận :{{$value->created_at}}
							</div>
							
							<div class="col-md-10" >
								<hr>
							</div>
							<br>
						@endforeach
					</div>						
			</div>
			@else
				<div class="row ">
					<div  class="col-md-12 " style=" margin-top: 25px;    margin-bottom: 50px;     margin-left: 15px;">
						<h3>Hiện chưa có bình luận nào</h3>
					</div>
				</div>
			@endif
					
					

				@endforeach
			
				<h2 class="product-head">Sản phẩm cùng loại</h2>
				@foreach($sanphamcl as $sp)
				<div class="col-md-4" style="float : left ">
									<div class="product-col">
											<div class="image">
												<a href="{!! url('chitietsanpham',$sp->id) !!}">
													<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $sp->avatar }}" alt="product" class="img-responsive" />
												</a>
											</div>
											  <?php $gia = number_format($sp->gia);
											        $ten =  substr( "$sp->ten" ,0,22 ); ?> 
												<div style="text-align: center;" ><a href="{!! url('chitietsanpham',$sp->id) !!}" ><h4> {{ $ten }} </h4></a></div>
												<div style="text-align: center;" class="price">
													<span class="price-new">{{ $gia }} VNĐ</span> 
													
												</div>
												<div class="cart-button">
													<button type="button" class="btn btn-cart">
														<a style="color: black" href="{!! url('giohang',[$sp->id]) !!}">Đặt mua ngay </a>
														<i class="fa fa-shopping-cart"></i>
													</button>									
												</div>
											
									</div>
								</div>
				@endforeach
			@else
			<div>Sản phẩm không tồn tại </div>
			@endif
			</div>
			
			
@endsection
<style text="css">
.thumbnail {
    transition: all 1s ease;
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
}

.thumbnail:hover {
	transform: scale(1.5,1.5);
-webkit-transform: scale(1.5,1.5);
-moz-transform: scale(1.5,1.5);
-o-transform: scale(1.5,1.5);
-ms-transform: scale(1.5,1.5);
}
</style>