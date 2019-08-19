
		<div class="header-top">
			<div class="container">
				<div class="row">
				<!-- Header Links Starts -->
					<div class="col-sm-8 col-xs-12">
						<div class="header-links">
							@if(Auth::check())
								@if(Auth::user()->shop==1)
									<ul class="nav navbar-nav pull-left">			
										<li>
											<a href="{{ route('kenhnguoiban') }}">
												<i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
												<span class="hidden-sm hidden-xs">
													Kênh người bán
												</span>
											</a>
										</li>
										
									</ul>
									<ul class="nav navbar-nav pull-left">
										<li>
											<a href="{{route('information')}}">
												<i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
												<span class="hidden-sm hidden-xs">
													Chào bạn :{{Auth::user()->ten}}
												</span>
											</a>
										</li>
										<li>
											<a href="{{route('logout')}}">Đăng xuất</a>
										</li>
										
									</ul>
								@else
								<ul class="nav navbar-nav pull-left">			
										<li>
											<a href="{{ route('dangkyshop') }}">
												<i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
												<span class="hidden-sm hidden-xs">
													Đăng kí shop
												</span>
											</a>
										</li>
										
									</ul>
									<ul class="nav navbar-nav pull-left">
										<li>
											<a href="{{route('information')}}">
												<i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
												<span class="hidden-sm hidden-xs">
													Chào bạn :{{Auth::user()->ten}}
												</span>
											</a>
										</li>
										<li>
											<a href="{{route('logout')}}">Đăng xuất</a>
										</li>
										
									</ul>
								@endif
							@else
								<ul class="nav navbar-nav pull-left">
								<li>
									<a href="{{route('login')}}">
										<i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
										<span class="hidden-sm hidden-xs">
											Kênh người bán
										</span>
									</a>
								</li>
								
							</ul>
							@endif
						</div>
					</div>
				<!-- Header Links Ends -->
				<!-- Currency & Languages Starts -->
					<div class="col-sm-4 col-xs-12">
						<div class="pull-right">
						<!-- Currency Starts -->
							
						<!-- Currency Ends -->
						<!-- Languages Starts -->
							
						<!-- Languages Ends -->
						</div>
					</div>
				<!-- Currency & Languages Ends -->
				</div>
			</div>
		</div>
	<!-- Header Top Ends -->
	<!-- Main Header Starts -->