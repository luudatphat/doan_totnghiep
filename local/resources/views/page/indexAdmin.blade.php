@extends('masterAdmin')
@section('content')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản Lý đơn đặt hàng</h1>
			</div>
		</div><!--/.row-->
									
		@if(Session::has('sai'))
		<div class="alert alert-danger">
			{{Session::get('sai')}}
		</div>
		@endif

		@if(Session::has('trangthai0'))
		<div class="alert alert-danger">
			{{Session::get('trangthai0')}}
		</div>
		@endif

		@if(Session::has('dung'))
		<div class="alert alert-success">
			{{Session::get('dung')}}
		</div>
		@endif

		@if(Session::has('trangthai'))
		<div class="alert alert-success">
			{{Session::get('trangthai')}}
		</div>
		@endif
		
		@if(Session::has('getDeletehoadonAdmin'))
		<div class="alert alert-success">
			{{Session::get('getDeletehoadonAdmin')}}
		</div>
		@endif

		@if(Session::has('delete_category'))
			<div class="alert alert-success">
				{{Session::get('delete_category')}}
			</div>
		@endif
			<div class="row" style="margin: 10px;">

				<div class="col-md-4 offset-md-4" style="float : right ; margin :30px 0px;">  
					<h2>Tìm kiếm </h2>
					<form class="input-group" method="get" action="{{ route('indexAdmin') }}">
						<input style="font-family:Times New Roman;" type="text" class="form-control input-lg" name="key" placeholder="Nhập mã hóa đơn ">
						<span class="input-group-btn">
							<button class="btn btn-lg" type="submiT">
								Tìm
							</button>
						</span>

					</form>
				</div>
				<form id="form_order" method="get">
					<div class="col-md-3 offset-md-3" style="float : left ; margin :30px 0px;"> 
						<h2>Sắp xếp </h2>

						<select class="form-control moicu" id="giaohangtinhtrang" name="giaohangtinhtrang"  >
							<option {{ Request::get('giaohangtinhtrang') == "tatca" ? "selected='selected'" : "" }} value="tatca" selected="" >Tất cả</option>
							<option {{ Request::get('giaohangtinhtrang') == "chuagiao" ? "selected='selected'" : "" }} value="chuagiao" >Chưa giao</option>
							<option {{ Request::get('giaohangtinhtrang') == "danggiao" ? "selected='selected'" : "" }} value="danggiao" >Đang giao</option>
							<option {{ Request::get('giaohangtinhtrang') == "giao" ? "selected='selected'" : "" }} value="giao">Giao</option>
							<option {{ Request::get('giaohangtinhtrang') == "chuaxuly" ? "selected='selected'" : "" }} value="chuaxuly">Chưa xử lý</option>
							<option {{ Request::get('giaohangtinhtrang') == "huy" ? "selected='selected'" : "" }} value="huy">Hủy</option>

						</select>
					</div>
				</form>
			</div>

		<div class="row" style="margin: 10px;">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							
							<th scope="col">Hóa đơn</th>
							<th scope="col">Người Mua</th>
							<!-- <th scope="col">Người Bán</th> -->
							<th scope="col">Phí dịch vụ</th>
							<th scope="col">Phí vận chuyển</th>
							<th scope="col">Tổng tiền</th>
							<th scope="col">Ngày giao</th>
							<th scope="col">Tình trạng đơn hàng </th>
							<th scope="col">Hoạt động</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($hoadon as $value)
						<tr>
							
							<td><a href="{{route('viewsanphamdonhang',[$value->id])}}">{{$value->ma}}</a></td>
							<td><a href="{{route('viewnguoidatdonhang',[$value->id])}}">{{$value->tennguoidat}}</a></td>
							<td>{{number_format($value->thue)}} vnd</td>
							<td>{{number_format($value->phiship)}} vnd</td>
							<td>{{number_format($value->tongtien)}} vnd</td>
							@if($value->hinhthucgiao == 0)
							<td>{{$value->ngaydukiengiao}}</td>
							@else
							<td>(Giao nhanh){{$value->ngaydukiengiao}}</td>
							@endif
						
                        @if($value->xuly==0)
                            <form method="post"  action="{{route('updatehoadonAdmin')}}"" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="idhoadon" value="{{$value->id}}">
                                <td>
                                    <select class="form-control trangthai" id="inputCountry" name="xuly"   >
                                      @if($value->trangthai==3)
                                         <option value="3"> Hóa đơn đã bị hủy</option>
                                      @else
                                          @if($value->xuly==0)
                                          <option value="0" selected="selected">Chưa Xử lý</option>
                                          <option value="1">Đã xử lý</option>
                                          @else
                                          <option value="1">Đã xử lý</option>
                                          @endif
                                      @endif
                                    </select>
                                </td>

                                <td class="text-center">
                                    @if($value->trangthai==3)
                                        <p style="font-weight: bold;">Đơn hàng đã hủy</p>
                                    @else
                                 
                                       <a> <button type="submit" title="Cập nhật" class="btn btn-warning" id="update">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button></a>
                                         <a href="{{route('deletedonhang',[$value->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" ><button type="button" title="Hủy" class="btn btn-danger"  >
                                           <i class="glyphicon glyphicon-trash"></i>
                                        </button></a>
                                    @endif
                                </td>
                            </form>
                        @else
                         <form method="post"  action="{{route('updatedonhang')}}"" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="idhoadon" value="{{$value->id}}">

                                        <td>
                                           <select class="form-control trangthai" id="inputCountry" name="trangthai"   >
                                                    
                                                    @if($value->trangthai==0)
                                                    <option value="0" selected="selected">chưa giao</option>
                                                    <option value="1">Đang giao</option>
                                                    <option value="2">Giao</option>

                                                    @elseif($value->trangthai==1)
                                                    <option value="1"selected="selected">Đang giao</option>
                                                    <option value="2">Giao</option>
                                                    @elseif($value->trangthai==3)
                                                    <option value="3"> Hóa đơn đã bị hủy</option>
                                                    @else
                                                    <option value="2"selected="selected" >Giao</option>

                                                    @endif
                                                </select>
                                            </td>

                                            <td class="text-center">
                                                @if($value->trangthai==3)
                                                    <p style="font-weight: bold;">Đơn hàng đã hủy</p>
                                                @else
                                                    @if($value->trangthai ==2)
                                                   
                                                    <p style="font-weight: bold;">Đơn hàng đã giao</p>
                                                    @else
                                                   <a><button type="submit" title="Update" class="btn btn-warning" id="update">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </button></a>
                                                    @endif

                                                    
                                                 @if($value->trangthai == 2)
                                                 @else
                                                    <a href="{{route('deletedonhangchushop',[$value->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" > <button type="button" title="Remove" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                                    </button></a>
                                                  @endif  
                                                
                                                @endif
                                            </td>
                            </form>
                        @endif
						</tr>
						@endforeach

					</tbody>
				</table>
			</div><!--/.col-->
			   <div style="text-align:center;">{!! $hoadon->appends($query)->links() !!}</div>
		</div><!--/.row-->
		<script src="jsadmin/jquery-1.11.1.min.js"></script>
		<script src="jsadmin/bootstrap.min.js"></script>
		<script src="jsadmin/chart.min.js"></script>
		<script src="jsadmin/chart-data.js"></script>
		<script src="jsadmin/easypiechart.js"></script>
		<script src="jsadmin/easypiechart-data.js"></script>
		<script src="jsadmin/bootstrap-datepicker.js"></script>

		<script type="text/javascript">



			$(function() {
				$('#giaohangtinhtrang').change(function(){

					$("#form_order").submit();
				});
			});


		</script>
		@endsection
