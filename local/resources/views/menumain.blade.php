<div class="collapse navbar-collapse navbar-cat-collapse fixNav">
					<ul class="nav navbar-nav">
						<li><a href="">TRANG CHỦ</a></li>
						@if(Auth::check())
						@else
						<li><a href="{{route('register')}}">ĐĂNG KÝ</a></li>
						<li><a href="{{route('login')}}">ĐĂNG NHẬP</a></li>
						@endif
						<li><a href="{{route('viewgiohang')}}">GIỎ HÀNG</a></li>
                        <li><a href="{{route('gioithieu')}}">GIỚI THIỆU</a></li>
                        <li><a href="{{route('quydinh')}}">Hướng dẫn</a></li>
						<li><a href="{{ route('lienhe') }}">LIÊN HỆ</a></li>
					</ul>
</div>