@extends('masterkenhnguoiban')
@section('content')
	<script type="text/javascript">
		function dienthoai()
	{

		document.getElementById("dienthoai").style.display = 'block';
		document.getElementById("laptop").style.display = 'none';
		document.getElementById("mypham").style.display = 'none';

	}

	function laptop()
	{
		
		document.getElementById("dienthoai").style.display = 'none';
		document.getElementById("laptop").style.display = 'block';
		document.getElementById("mypham").style.display = 'none';
		

	}
	function mypham()
	{

		document.getElementById("dienthoai").style.display = 'none';
		document.getElementById("laptop").style.display = 'none';
		document.getElementById("mypham").style.display = 'block';

	}
	 window.onload = function()
            {
            	var a = document.getElementsByName("optionsRadios");
				for (var i = 0; i < a.length; i++)
				{
					if (a[i].checked === true)
					{
						var c = a[i].value;

					}
				}

							if(c==1)
							{
								document.getElementById("dienthoai").style.display = 'block';
		document.getElementById("laptop").style.display = 'none';
		document.getElementById("mypham").style.display = 'none';
							}
							else if(c==2)
							{
document.getElementById("dienthoai").style.display = 'none';
		document.getElementById("laptop").style.display = 'block';
		document.getElementById("mypham").style.display = 'none';
							}	
							else
							{
	document.getElementById("dienthoai").style.display = 'none';
		document.getElementById("laptop").style.display = 'none';
		document.getElementById("mypham").style.display = 'block';
							}
            };
</script>

<!-- Header Section Ends -->


	<!-- Main Container Starts -->


         <div class="col-md-12">
        <div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">ĐĂNG BÁN SẢN PHẨM</h3>
							
						</div>
						<div class="panel-body">
						<!-- Registration Form Starts -->
							<form class="form-horizontal" role="form" enctype="multipart/form-data" id="formsumit" action="{{route('dangbansanpham')}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								@if(Session::has('thanhcong'))
								<div class="alert alert-success">
									{{Session::get('thanhcong')}}
								</div>
								@endif
					
								<div class="form-group">
									<label for="inputLname" class="col-sm-3 control-label">Tên sản phẩm :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputTen" name="inputTen" placeholder="Tên sản phẩm">
										@if($errors->has('inputTen'))
											<p style="color: red"> {{$errors->first('inputTen')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label">Avatar :</label>
									<div class="col-sm-9">
										<input type="file" class="form-control" id="inputAvatar" name="inputAvatar" placeholder="Avatar">
										@if($errors->has('inputAvatar'))
											<p style="color: red"> {{$errors->first('inputAvatar')}}</p>
										@endif
									</div>
								</div>	
							
								<div class="form-group">
									<label for="inputEmail" class="col-sm-3 control-label"> Ảnh chi tiết :</label>
									<div class="col-sm-9">
										<input type="file" name="image[]" multiple="multiple" class="form-control"  placeholder="Avatar">
										@if($errors->has('image'))
										<p style="color: red"> {{$errors->first('image')}}</p>
										@endif
									</div>
								</div>	
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Giá :</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="Gia" name="inputGia" placeholder="Giá" onchange="return check()">
										@if($errors->has('inputGia'))
											<p style="color: red"> {{$errors->first('inputGia')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Giá khuyến mãi :</label>
									<div class="col-sm-9">
										<input type="number" step="any" name="inputGiaKM" id="GiaKM" onchange="return checkKM()" >							
										@if($errors->has('inputGiaKM'))
											<p style="color: red"> {{$errors->first('inputGiaKM')}}</p>
										@endif
									</div>
								</div>
							
								<div class="form-group">
									<label  class="col-sm-3 control-label">Mô tả</label>
									<div class="col-sm-9">
										<textarea  id="inputMota" name="inputMota" class="form-control" rows="10" placeholder="Mô tả"></textarea>
										@if($errors->has('inputMota'))
											<p style="color: red"> {{$errors->first('inputMota')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Loại sản phẩm :</label>
									<div class="col-sm-9">
										<div class="radio">
											
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="1"   onchange="dienthoai()" value="{{old('checked')}}"  {{(old('optionsRadios') == '1') ? 'checked' : ''}}  checked="" >
												

												Điện Thoại
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="2" onchange="laptop()" value="{{old('checked')}}"  {{(old('optionsRadios') == '2') ? 'checked' : ''}} >
												Laptop
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="3" onchange="mypham()"  value="{{old('checked')}}"  {{(old('optionsRadios') == '3') ? 'checked' : ''}} >
												Mỹ phẩm
											</label>
										</div>
									</div>
								</div>

						<!-- form dien thoai -->
							<div class="form-group" id="dienthoai">
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Hãng :</label>
									<div class="col-sm-9">
										<select class="form-control trangthai" id="trangthai" name="trangthai"  >
										
											@foreach($dienthoai as $value)
												<option value="{{$value->id}}" {{(old('trangthai') == $value->id) ? 'selected' : ''}}>{{$value->ten}}</option>
											@endforeach
								
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Camera trước :</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputCameratruoc" name="inputCameratruoc" placeholder="Camera trước">
										@if($errors->has('inputCameratruoc'))
											<p style="color: red"> {{$errors->first('inputCameratruoc')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Camera sau :</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputCamerasau"  name="inputCamerasau"placeholder="Camera sau ">
										@if($errors->has('inputCamerasau'))
											<p style="color: red"> {{$errors->first('inputCamerasau')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Bộ nhớ trong :</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="inputBonho" name="inputBonho"  placeholder="Bộ nhớ trong ">
										@if($errors->has('inputBonho'))
											<p style="color: red"> {{$errors->first('inputBonho')}}</p>
										@endif
									</div>
								</div>

							</div>
							<!-- End form dien thoai -->

								<!-- form laptop -->
							<div class="form-group" id="laptop" style="display: none;">
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Hãng :</label>
									<div class="col-sm-9">
										<select class="form-control trangthai" id="trangthailaptop" name="trangthailaptop"  >
									
											@foreach($laptop as $value)
												<option value="{{$value->id}}" {{(old('trangthailaptop') == $value->id) ? 'selected' : ''}}>{{$value->ten}}</option>
											@endforeach								
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Hệ điều hành :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputHedieuhanh" name="inputHedieuhanh" placeholder="Hệ điều hành">
										@if($errors->has('inputHedieuhanh'))
											<p style="color: red"> {{$errors->first('inputHedieuhanh')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Cpu :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputCpu" name="inputCpu" placeholder="Cpu">
										@if($errors->has('inputCpu'))
											<p style="color: red"> {{$errors->first('inputCpu')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Ram:</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="inputRam" name="inputRam" placeholder="Ram">GB
										@if($errors->has('inputRam'))
											<p style="color: red"> {{$errors->first('inputRam')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Ổ cứng:</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="inputOcung" name="inputOcung" placeholder="Ổ cứng">GB
										@if($errors->has('inputOcung'))
											<p style="color: red"> {{$errors->first('inputOcung')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Màn hình:</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputManhinh" name="inputManhinh" placeholder="Màn hình">inch
										@if($errors->has('inputManhinh'))
											<p style="color: red"> {{$errors->first('inputManhinh')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Card đồ họa:</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputDohoa" name="inputDohoa" placeholder="Card đồ họa">
										@if($errors->has('inputDohoa'))
											<p style="color: red"> {{$errors->first('inputDohoa')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Pin:</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputPin" name="inputPin" placeholder="Pin"> Tiếng
										@if($errors->has('inputPin'))
											<p style="color: red"> {{$errors->first('inputPin')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Trọng lượng:</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputTrongluong" name="inputTrongluong" placeholder="Trọng lượng">Kg
										@if($errors->has('inputTrongluong'))
											<p style="color: red"> {{$errors->first('inputTrongluong')}}</p>
										@endif
									</div>
								</div>

							</div>
							<!-- End form laptop -->
								<!-- form my pham-->
							<div class="form-group" id="mypham" style="display: none;">
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Hãng :</label>
									<div class="col-sm-9">
										<select class="form-control trangthai" id="trangthaimypham" name="trangthaimypham"  >
										
											@foreach($mypham as $value)
												<option value="{{$value->id}}" {{(old('trangthaimypham') == $value->id) ? 'selected' : ''}}>{{$value->ten}}</option>
											@endforeach	
										</select>
									</div>
								</div>
						
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Xuất xứ :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputXuatxu" name="inputXuatxu" placeholder="Xuất xứ">
										@if($errors->has('inputXuatxu'))
											<p style="color: red"> {{$errors->first('inputXuatxu')}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="inputPhone" class="col-sm-3 control-label">Trọng lượng :</label>
									<div class="col-sm-9">
										<input type="number" step="any" class="form-control" id="inputTrongluongmp" name="inputTrongluongmp" placeholder="Trọng lượng">g
										@if($errors->has('inputTrongluongmp'))
											<p style="color: red"> {{$errors->first('inputTrongluongmp')}}</p>
										@endif
									</div>
								</div>

							</div>
							<!-- End form my pham -->

							





								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-black" id="dangsanpham" >
											Đăng bán sản phẩm
										</button>
									</div>
								</div>
							<!-- Password Area Ends -->
							</form>
						<!-- Registration Form Starts -->
						</div>							
					</div>
				</div>

	<!-- Main Container Ends -->

<!-- Footer Section Ends -->
<!-- JavaScript Files -->
<script>
	function check()
	{
	var vNumber = document.getElementById("Gia");
	var a= vNumber.value;
	if(a < 0)
	{
		alert('vui lòng nhập số dương');
		return vNumber.value='';
	}
	else return true;
	}
	function checkKM()
	{
	var vNumber = document.getElementById("GiaKM");
	var a= vNumber.value;
	if(a < 0 )
	{
		alert('vui lòng nhập số dương');
		return vNumber.value='';
	}
	if(a>99)
	{
		alert('Khuyến mãi tối đa 99%');
		return vNumber.value='';
	}
	else return true;
	}
</script>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>	
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-hover-dropdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
@endsection