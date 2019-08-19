@extends('master')
@section('content')
			<div class="col-md-9">
			<!-- Breadcrumb Starts -->
			<?php $a=0;
			if(isset($loai))
            { $a=1;
			?>
            @foreach($loai as $l)
			<h2 class="product-head">Lọc Tìm Kiếm</h2>
			<?php if(isset($_GET['key']))
			{ 
				$key =  $_GET['key'];
				
				} 
				else $key=''; ?>
			<div class="list-group-item">
                <form method="get" action="{{ route('loctimkiem') }}/{{ $l->id }}" >
                    Giá từ: <input type="number" name="giamin"  placeholder="Nhập giá nhỏ nhất" >
                    Đến : <input type="number" name="giamax"   placeholder="Nhập giá lớn nhất" >
                    <input type="hidden" name="key" value = {{$key}} >
                    
                    
                    @endforeach
                <button type="submit">Lọc
                </form>
			</div>
			<?php } ?>	
			<?php
			
			 if(count($ten)>0)
			{ $a=1; ?>
			<h2 class="product-head">Kết Quả Sản Phẩm Tìm Kiếm</h2>
				<!-- Heading Ends -->
				<!-- Products Row Starts -->
					<div class="row">
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
												<div style="text-align: center;"><a href="product.html"><h4>{{ $name }}</h4></a></div>
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
			<?php if(isset($shop)){ $a=1; ?>
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
									<div class="col-md-9" style="float left;">Sản phẩm :</div>
								</div>
								<div><h5>&ensp;&emsp;<a href="product.html">{{ $s->tenshop }}</a></h5></div>
								<div>
								
								</div>
							</div>
						@endforeach
									
								
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
				<?php
				if(isset($_GET['key']))
				{ 
					$key =  $_GET['key'];
					
					} 
					else $key='';  
				if(isset($_GET['giamin']))
					{ 
						$giamin =  $_GET['giamin'];
						
						} 
						else $giamin=0;
				if(isset($_GET['giamax']))
						{ 
							$giamax =  $_GET['giamax'];
							
							} 
							else $giamax=999999;		
				if(isset($key))
				{
					
					?>
					
					<div style="text-align:center;">{!! $ten->appends(['key' => $key , 'giamin' => $giamin ,'giamax' => $giamax])->links() !!}</div>
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