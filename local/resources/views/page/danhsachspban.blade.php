
@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->
		@if(isset($sanpham))
			@if(count($sanpham)>0)
				@if($flag==0)	 
				<h2 class="product-head">Danh sách sản phẩm đang chờ duyệt</h2>
				@endif
				@if($flag==1)	 
				<h2 class="product-head">Danh sách sản phẩm đang bán</h2>
				@endif
					
				
					<!-- Heading Ends -->
					<!-- Products Row Starts -->
						<div class="row">
						
							<div class="col-xs-12">
							<!-- Product Carousel Starts -->
								
								<!-- Product #1 Starts -->
								
								@foreach($sanpham as $kq)
									<div class="col-md-3" style="float : left ">
										<div class="product-col">
											
												<div class="image" >
													<a href="{!! url('suasp',$kq->id) !!}">
														<img style="width: 220px; height: 250px;"  src="images/sanpham/{{ $kq->avatar }}"  alt="product" class="img-responsive" />
														
													</a>
												</div>
												<?php $gia = number_format($kq->gia);
														$name =  substr( "$kq->ten" ,0,22 ); ?> 												
													<div style="text-align: center;"><a href="{!! url('suasp',$kq->id) !!}" >
													<h4>{{ $name }}</h4></a></div>
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
													<div style="text-align: center;">
														<button type="button" class="btn" style="background-color: green;">
														<i class="fa fa-edit"><a style="color: black" href="{!! url('suasp',$kq->id) !!}">Chỉnh sửa</a></i>															
														</button>
														<button type="button" class="btn" style="background-color: red;">
														<i class="fa fa-trash"></i><a style="color: black" href="{!! url('xoasp',$kq->id) !!}" 
														onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" >Xóa</a></i>								
														</button>									
													</div>		
										</div>
									</div>
									@endforeach
									@else
										<div>Hiện không có sản phẩm , xin mời <a href="{{route('dangbansanpham')}}">đăng bán sản phẩm</a></div>
									@endif
								@endif
							

							<!-- Product #1 Ends -->
							
						
						<!-- Product Carousel Ends -->
						</div>
						@if(isset($sanpham))
								 
                        <div class="col-xs-12">
                            <div style="text-align:center;">{!! $sanpham->links() !!}</div>
                        </div>
								@endif
					</div>
			
	<!-- Main Container Ends -->

<!-- Footer Section Ends -->
<!-- JavaScript Files -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>	
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-hover-dropdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
@endsection