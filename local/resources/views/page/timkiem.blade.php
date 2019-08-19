@extends('master')
@section('content')
			<div class="col-md-9">
			<!-- Breadcrumb Starts -->
			<?php $a=0;
			if(count($loai)>0)
			{ $a=1;
			?>
			<h2 class="product-head">Lọc Tìm Kiếm</h2>
			<?php if(isset($_GET['key']))
			{ 
				$key =  $_GET['key'];
				
				} 
				else $key=''; ?>
			<div class="list-group-item">
				@foreach($loai as $l)
					<a href="{{ route('timkiem') }}/{{ $l->id }}?key={{$key}}">{{ $l->ten }}</a><br>
				@endforeach
				
			</div>
			<?php } ?>	
			<?php
			
			 if(count($ten)>0)
			{ $a=1; ?>
			<h2 class="product-head">Kết Quả Sản Phẩm Tìm Kiếm</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
					<div class="row">
					<div class="col-xs-12">Kết quả có {{$soluong->count()}} sản phẩm</div>
						<div class="col-xs-12">
						<!-- Product Carousel Starts -->
							
							<!-- Product #1 Starts -->
							@foreach($ten as $kq)
								<div class="col-md-4" style="float : left ">
									<div class="product-col">
										
											<div class="image">
												<a href="{!! url('chitietsanpham',$kq->id) !!}">
													<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $kq->avatar }}" alt="product" class="img-responsive" />
												</a>
											</div>
											<?php $gia = number_format($kq->gia);
											        $name =  substr( "$kq->ten" ,0,22 ); ?> 
												<div style="text-align: center;"><a href="{!! url('chitietsanpham',$kq->id) !!}" ><h4>{{ $name }}</h4></a></div>
												@if($kq->khuyenmai>0)	
												<div class="price">
													<span  class="price-new">{{ number_format($kq->giakm) }} VNĐ</span><br>
													<span style="text-decoration: line-through; color: #989ba2;">{{ $gia }} VNĐ</span>

												</div>
												
												@else
												<div style="text-align: center;"  class="price">
													<span class="price-new">{{ $gia }} VNĐ</span> <br>
													&nbsp;

												</div>
												@endif
												<div class="cart-button">
													<button type="button" class="btn btn-cart">
														<a style="color: black" href="{!! url('giohang',[$kq->id]) !!}">Đặt mua ngay </a>
														<i class="fa fa-shopping-cart"></i>
													</button>									
												</div>
											
									</div>
								</div>
							@endforeach
							<!-- Product #1 Ends -->
							
						
						<!-- Product Carousel Ends -->
						</div>
					</div>
			<?php } ?>
			<?php if(count($shop)>0)
			{ 
				$a=1; ?>
				<h2 class="product-head">Kết Quả Cửa Hàng Tìm Kiếm</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
				
					<div class="row">
					
						<!-- Product Carousel Starts -->
							
							<!-- Product #1 Starts -->
								
						@foreach($shop as $s)
							<div class="col-xs-12">
								<div class="col-md-12">
									<div class="col-md-2">
									<img style="width: 70px; height: 70px;" src="images/user/{{ $s->avatar }}" alt="product" class="img-responsive" /></div>
									<?php $count = DB::table('sanpham')->join('nguoidung','sanpham.idnguoidung','=','nguoidung.id')->where('idnguoidung',$s->id) ?>
									<div class="col-md-9" style="float left;">Sản phẩm :{{ $count->count() }}</div>
								</div>
								<div><h5>&ensp;&emsp;<a href="{!! url('sanphamshop',$s->id) !!}">{{ $s->tenshop }}</a></h5></div>
								<div>
								
								</div>
								<hr>
							</div>
						@endforeach
									
								
							<!-- Product #1 Ends -->
							
							
						<!-- Product Carousel Ends -->
					</div>
					
			<?php } ?>
			<?php if(isset($ma))
			{ 
				$a=1; ?>
				<h2 class="product-head">Kết Quả Tìm Kiếm theo mã sản phẩm</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
				
					<div class="row">
					
						<!-- Product Carousel Starts -->
							
							<!-- Product #1 Starts -->
								
							<div class="col-xs-12">
						<!-- Product Carousel Starts -->
							
							<!-- Product #1 Starts -->
							
							<div class="col-md-4" style="float : left ">
									<div class="product-col">
										
											<div class="image">
												<a href="{!! url('chitietsanpham',$ma->id) !!}">
													<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $ma->avatar }}" alt="product" class="img-responsive" />
												</a>
											</div>
											<?php $gia = number_format($ma->gia);
											        $name =  substr( "$ma->ten" ,0,22 ); ?> 
												<div style="text-align: center;"><a href="{!! url('chitietsanpham',$ma->id) !!}" ><h4>{{ $name }}</h4></a></div>
												@if($ma->khuyenmai>0)	
												<div class="price">
													<span  class="price-new">{{ number_format($ma->giakm) }} VNĐ</span><br>
													<span style="text-decoration: line-through; color: #989ba2;">{{ $gia }} VNĐ</span>

												</div>
												
												@else
												<div style="text-align: center;"  class="price">
													<span class="price-new">{{ $gia }} VNĐ</span> <br>
													&nbsp;

												</div>
												@endif
												<div class="cart-button">
													<button type="button" class="btn btn-cart">
														<a style="color: black" href="{!! url('giohang',[$ma->id]) !!}">Đặt mua ngay </a>
														<i class="fa fa-shopping-cart"></i>
													</button>									
												</div>
											
									</div>
								</div>
							
							<!-- Product #1 Ends -->
							
						
						<!-- Product Carousel Ends -->
						</div>
									
								
							<!-- Product #1 Ends -->
							
							
						<!-- Product Carousel Ends -->
					</div>
					
			<?php } ?>
			<?php
				if($a==0)
					echo 'Hiện không tìm thấy sản phẩm và cửa hàng';
			 ?>
				 
				
			<!-- Product Grid Display Ends -->
			</div>
			<div class="col-md-9">
				<?php if(isset($key))
					{
						?>
						<div style="text-align:center;">{!! $ten->appends(['key' => $key])->links() !!}</div>
					<?php
					}
					else
					{
					?>
						<div style="text-align:center;">{!! $ten->links() !!}</div>
					<?php
					}
					?>
			</div>
@endsection