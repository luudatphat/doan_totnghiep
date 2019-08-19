@extends('master')
@section('content')
			<div class="col-md-9">
			<h2 class="product-head">Sản phẩm khuyến mãi</h2>
			<div class="col-xs-12">Kết quả có {{$soluong->count()}} sản phẩm</div>
			<!-- Breadcrumb Starts -->
				@foreach($sanpham as $sp)
				<div class="col-md-4" style="float : left;  ">
									<div class="product-col">
											<div class="image">
												<a href="{!! url('chitietsanpham',$sp->id) !!}">
													<img style="width: 220px; height: 250px;" src="images/sanpham/{{ $sp->avatar }}" alt="product" class="img-responsive" />
												</a>
											</div>
											  <?php $gia = number_format($sp->gia);
											        $ten =  substr( "$sp->ten" ,0,22 ); ?> 
												<div style="text-align: center;" ><a href="{!! url('chitietsanpham',$sp->id) !!}" ><h4> {{ $ten }} </h4></a></div>
												
												@if($sp->khuyenmai>0)	
												<div class="price">
													<span  class="price-new">{{ number_format($sp->giakm) }} VNĐ</span><br>
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
														<a style="color: black" href="{!! url('giohang',[$sp->id]) !!}">Đặt mua ngay </a>
														<i class="fa fa-shopping-cart"></i>
													</button>									
												</div>
											
									</div>
								</div>
				@endforeach
				
			<!-- Product Grid Display Ends -->
			</div>
			<div class="col-md-9">
				<div style="text-align:center;">{!! $sanpham->links() !!}</div>
			</div>
@endsection