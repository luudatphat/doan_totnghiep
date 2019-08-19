@extends('master')
@section('content')
			<div class="col-md-9">
			<!-- Slider Section Starts -->
				<div class="slider">
					<div id="main-carousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper For Slides Starts -->
						<div class="carousel-inner">
							<div class="item active">
								<img src="images/slider-imgs/Capture1.jpg" alt="Slider" class="img-responsive" />
							</div>
							<div class="item">
								<img src="images/slider-imgs/Capture2.jpg" alt="Slider" class="img-responsive" />
							</div>
						</div>
					<!-- Wrapper For Slides Ends -->
					<!-- Controls Starts -->
						<a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					<!-- Controls Ends -->
					</div>	
				</div>
			<!-- Slider Section Ends -->
			<!-- 2 Column Banners Starts -->
				<div class="col2-banners">
					<ul class="row list-unstyled">
						<li class="col-sm-12">
							<a href="{!! url('bigsale') !!}"><img src="images/bigsale.png" alt="banners" class="img-responsive" /></a>
						</li>
						
					</ul>
				</div>
			<!-- 2 Column Banners Ends -->
			<!-- Latest Products Starts -->
				<section class="product-carousel">
				<!-- Heading Starts -->
					<h2 class="product-head">Sản phẩm bán chạy</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
					<div class="row">
						<div class="col-xs-12">
						<!-- Product Carousel Starts -->
							<div id="owl-product" class="owl-carousel">

							<!-- Product #1 Starts -->
							<?php   $sanpham = DB::table('sanpham')->where('trangthai',1)->where('duyet',1)->orderBy('soluongmua', 'desc')->limit(10)->get(); ?>
							@foreach($sanpham as $sp)
								<div class="item">
									<div class="product-col">
										<div class="image">
											<a href="{!! url('chitietsanpham',$sp->id) !!}">
												<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $sp->avatar }}" alt="product" class="img-responsive" />
											</a>
										</div>
										<div class="caption">
												  <?php $gia = number_format($sp->gia);
											        $ten =  substr( "$sp->ten" ,0,22 ); ?>

											<div style="text-align: center;" ><a href="{!! url('chitietsanpham',$sp->id) !!}" ><h4> {{ $ten }} </h4></a></div>
										@if($sp->khuyenmai>0)	
											<div class="price">
												<span  class="price-new">{{ number_format($sp->giakm) }} VNĐ</span><br>
												<span class="price-old">{{ $gia }} VNĐ</span>

											</div>
											<div class="description">
												Khuyến mãi {{$sp->khuyenmai}}%
											</div>
										@else
											<div style="text-align: center;"  class="price">
												<span class="price-new">{{ $gia }} VNĐ</span><br> 
												<span>&nbsp;</span>
											</div>
											<div class="description">
												&nbsp;
											</div>
										@endif


											<div class="cart-button">
												<button type="button" class="btn btn-cart">
													<a style="color: black" href="{!! url('giohang',[$sp->id]) !!}">Đặt mua ngay </a>
													<i class="fa fa-shopping-cart"></i>
												</button>									
											</div>

										</div>
									</div>
								</div>
							@endforeach
							
											
							<!-- Product #1 Ends -->
				
							</div>
						<!-- Product Carousel Ends -->
						</div>
					</div>
				<!-- Products Row Ends -->
				</section>

			<!-- Latest Products Ends -->
			<!-- Specials Products Starts -->
				<section class="products-list">			
				<!-- Heading Starts -->
					<h2 class="product-head">Các sản phẩm giảm giá</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
					<div class="row">
					<!-- Product #1 Starts -->
					<?php $khuyenmai = DB::table('sanpham')->where('khuyenmai','>',0)->where('trangthai',1)->where('duyet',1)->inRandomOrder()->limit(3)->get(); ?>
						@foreach($khuyenmai as $value)
						<div class="col-md-4 col-sm-6">
							
							<div class="product-col">
							
								<div class="image">
									<a href="{!! url('chitietsanpham',$value->id) !!}">
										<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $value->avatar }}" alt="product" class="img-responsive" />
									</a>
								</div>
								<div class="caption">
									<div style="text-align: center;" >
										<?php   $tenkhuyenmai =  substr( "$value->ten" ,0,22 ); ?>
										<h4>
											<a href="{!! url('chitietsanpham',$value->id) !!}" >{{ $tenkhuyenmai }} </a>
										</h4>
									</div>
							
								
									<div class="price">
										<span  class="price-new">{{ number_format($value->giakm) }} VNĐ</span> <br>
										<span class="price-old">{{ number_format($value->gia) }} VNĐ</span>

									</div>
									<div class="description">
										Khuyến mãi {{$value->khuyenmai}}%
									</div>
									<div class="cart-button">
										<button type="button" class="btn btn-cart">
											<a style="color: black" href="{!! url('giohang',[$value->id]) !!}">Đặt mua ngay </a>
											<i class="fa fa-shopping-cart"></i>
										</button>									
									</div>

								</div>
								
							</div>
							
						</div>
						@endforeach
					<!-- Product #1 Ends -->
					<!-- Product #2 Starts -->
			
					<!-- Product #2 Ends -->
					<!-- Product #3 Starts -->
					
						
					<!-- Product #3 Ends -->

					</div>
				<!-- Products Row Ends -->
				</section>
			

						
			</div>
@endsection