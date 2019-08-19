
			<div class="col-md-3">
			<!-- Categories Links Starts -->
				<h3 class="side-heading">Loại sản phẩm</h3>
				<div class="list-group categories">
					<?php $loai = DB::table('loai')->get(); ?>
					@foreach($loai as $l)
					<div class="dropdown" >
						<a href="{!! url('loaisanpham',$l->id) !!}" class="list-group-item"  data-hover="dropdown" >
							<i class="fa fa-chevron-right"></i>
							{{ $l->ten }}
						</a>
						<ul class="dropdown-menu" >
							<?php $hang = DB::table('hang')->select('ten','id')->where('idloai',$l->id)->where('trangthai',0)->get(); ?>
							@foreach($hang as $h)
							<li><a tabindex="-1" href="{!! url('hangsanpham',$h->id) !!}">{{ $h->ten }}</a></li>
							@endforeach
						</ul>
					</div>
					@endforeach
				</div>
			<!-- Categories Links Ends -->
			<img src="images/banners/galaxy-a50-9.jpg" alt="Side Banner" class="img-responsive" " />
				<br>
			<!-- Special Products Starts -->
			<?php  $sanpham = DB::table('sanpham')->where('trangthai',1)->where('duyet',1)->inRandomOrder()->limit(5)->get(); ?>
				<h3 class="side-heading">Sản phẩm mới</h3>
				<ul class="side-products-list">
				<!-- Special Product #1 Starts -->
					@foreach($sanpham as $value)
					<li class="clearfix">
						<div class="col-md-4 " ><img src="images/sanpham/{{$value->avatar}}" alt="Special product" class="img-responsive" " /></div>
						<div class="col-md-6 "><h5><a href="{!! url('chitietsanpham',$value->id) !!}" >{{$value->ten}}</a></h5></div>
						
						<div class="col-md-12 price">
							@if($value->giakm > 0)
							<span class="price-new">{{ number_format($value->giakm) }}vnđ</span> 
							<span class="price-old">{{ number_format($value->gia) }}vnđ</span>
							@else
							<span class="price-new">{{ number_format($value->gia) }}vnđ</span> 
							@endif
						
						</div>
						

					</li>
				@endforeach
					
				<!-- Special Product #1 Ends -->
				</ul>
			<!-- Special Products Ends -->
			<!-- Banner #1 Starts -->
				<img src="images/banners/iphone-xs-256gb-white-400x460.png" alt="Side Banner" class="img-responsive" />
				<br>
			<!-- Banner #1 Ends -->
			<!-- Shopping Options Starts -->
				
				
			<!-- Shopping Options Ends -->
			</div>