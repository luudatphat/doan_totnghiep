
@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->
    <?php if(isset($_GET['key']))
            { 
                $key =  $_GET['key'];
                
                } 
                ?>

        <!-- table  -->

    	
                <div class="col-md-4 offset-md-4" style="float : right ; margin :30px 0px;">  
                <form class="input-group" method="get" action="{{ route('timkiemdonhang') }}">
                    <input style="font-family:Times New Roman;" type="text" class="form-control input-lg" name="key" placeholder="Nhập số hoặc tên người đặt">
                    <span class="input-group-btn">
                        <button class="btn btn-lg" type="submiT">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>

                </form>
            </div>
<!-- Table moi nhat -->

      @if(count($donhang)>0)

                <div  id ="moinhat" >
              
                    <table class="table table-hover " >
                       <thead>
                          <tr>
                             <th scope="col">Số hóa đơn</th>
                             <th scope="col">Tài khoản đặt hàng</th>       			
                             <th scope="col">Tên người đặt</th>
                        			<!-- <th scope="col">Địa chỉ</th>
                        			<th scope="col">Số điện thoại</th>
                        			<th scope="col">Email</th> -->
                        			<th scope="col">Giá chưa tính thuể</th>
                        			<th scope="col">Thuế</th>
                        			<th scope="col">Tổng tiền</th>
                        			<th scope="col">Trang thái</th>
                        			

                        		</tr>
                        	</thead>

                          <?php $index=0; ?>
                          @foreach($donhang as $value)
                          <tbody>
                             <tr>
                                <th scope="row" name="idhoadon"><a href="{{route('viewsanphamdonhang',[$value->id])}}">{{$value->id}}</a></th>
                                <td>{{$value->tennguoidung}}</td>
                                <td><a href="{{route('viewnguoidatdonhang',[$value->id])}}">{{$value->tennguoidat}}</a></td>
                        				<!-- <td>{{$value->diachi}}</td>
                        				<td>{{$value->dienthoai}}</td>
                        				<td>{{$value->email}}</td> -->
                        				<td>{{$value->tongtienchuathue}}</td>
                        				<td>{{$value->thue}}</td>
                        				<td>{{$value->tongtien}}</td>
                                        @if($value->trangthai==0)
                                        
                                                <td>Chưa giao</td>
                                        
                                        @elseif($value->trangthai==1)
                                        
                                            <td>Đang giao</td>
                                        
                                        @else 
                                        
                                             <td>Giao</td>
                                        
                                        @endif
                        				
                        			
                        			</tr>
                        		</tbody>
                        		@endforeach


                            </table>

     

                        </div>

                        <div class="col-md-9">

                            <?php if(isset($key))
                            {
                                ?>
                                <div style="text-align:center;">{!! $donhang->appends(['key' => $key])->links() !!}</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div style="text-align:center;">{!! $donhang->links() !!}</div>
                                <?php
                            }
                            ?>
                        </div>
                        @else
                             <div class="col-md-12" style="float : right ; margin :30px 0px;">  
                           <h2 style="text-align: center;">Không tìm thấy</h2></div>
                        @endif
	
	
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

@endsection