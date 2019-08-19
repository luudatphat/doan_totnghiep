<div class="col-md-3">
						<div id="cart" class="btn-group btn-block">
							<button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle">
								<i class="fa fa-shopping-cart"></i>
								<span class="hidden-md">Giỏ hàng :</span> 
								<span id="cart-total">{{Cart::count()}}-{{Cart::subtotal()}}</span>
								<i class="fa fa-caret-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li>
									<table class="table hcart">
											@foreach(Cart::content() as $item)
										<tr>
											<!-- <td class="text-center">
												<a href="product.html">
													<img src="images/product-images/hcart-thumb1.jpg" alt="image" title="image" class="img-thumbnail img-responsive" />
												</a>
											</td> -->
											<td class="text-left">
												<a href="product-full.html">
													{{$item->name}}
												</a>
											</td>
											<td class="text-right">{{$item->qty}}</td>
											<td class="text-right">{{number_format($item->price*$item->qty,0,',','.')}} vnd</td>
											<td class="text-center">
												<a href="#">
													<i class="fa fa-times"></i>
												</a>
											</td>
										</tr>
										@endforeach
										<!-- <tr>
											<td class="text-center">
												<a href="product.html">
													<img src="images/product-images/hcart-thumb2.jpg" alt="image" title="image" class="img-thumbnail img-responsive" />
												</a>
											</td>
											<td class="text-left">
												<a href="product-full.html">
													Organic
												</a>
											</td>
											<td class="text-right">x 2</td>
											<td class="text-right">$240.00</td>
											<td class="text-center">
												<a href="#">
													<i class="fa fa-times"></i>
												</a>
											</td>
										</tr> -->
									</table>
								</li>
								<li>
									<table class="table table-bordered total">
										<tbody>
											<!-- <tr>
												<td class="text-right"><strong>Sub-Total</strong></td>
												<td class="text-left">$1,101.00</td>
											</tr>
											<tr>
												<td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
												<td class="text-left">$4.00</td>
											</tr>
											<tr>
												<td class="text-right"><strong>VAT (17.5%)</strong></td>
												<td class="text-left">$192.68</td>
											</tr> -->
											<tr>
												
												<td class="text-right"><strong>Tổng tiền</strong></td>
												<td class="text-left">{{Cart::subtotal()}}</td>
											</tr>
										</tbody>
									</table>
									<p class="text-right btn-block1">
										<a href="{{route('viewgiohang')}}">
											Giỏ hàng
										</a>
										<a href="#">
											Tiếp tục mua
										</a>
									</p>
								</li>									
							</ul>
						</div>
					</div>