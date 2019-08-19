

@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


    <!-- Main Container Starts -->

    <h2 class="product-head">Sửa sản phẩm</h2>
    @if(isset($sanpham))
    @foreach($sanpham as $sp)
    <form class="form-group" method="post" action="{!! url('update',$sp->id) !!}" enctype="multipart/form-data"  >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="col-sm-12">
            
            
            
            @if($sp->idloai==1)
                
                    <div class = "col-md-3">
                        <label>Tên sản phẩm :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="tensanpham" value="{{ $sp->ten }}">
                        @if($errors->has('tensanpham'))
                                <p style="color: red"> {{$errors->first('tensanpham')}}</p>
                        @endif
                    </div>
                
                
                
                    <div class = "col-md-3">
                        <label>Ảnh đại diện :</label>
                        </div>
                    <div class = "col-md-9">
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $sp->avatar }}" />
                        
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Giá :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="gia" id="Gia"  value="{{ $sp->gia }}" onchange="return check()">VNĐ
                        @if($errors->has('gia'))
                                <p style="color: red"> {{$errors->first('gia')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Khuyến mãi :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="khuyenmai" id="KM"  value="{{ $sp->khuyenmai }}" onchange="return checkkm()" > %
                       
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Mô Tả :</label>
                        </div>
                    <div class = "col-md-9">
                    <textarea cols="125" rows="10" charswidth="23" name="mota" style="resize:vertical">{{$sp->mota}}</textarea>
                    @if($errors->has('mota'))
                                <p style="color: red"> {{$errors->first('mota')}}</p>
                        @endif
                    </div>
                
                <?php $thongso = DB::table('thongso')->join('tsdienthoai','thongso.id','tsdienthoai.idthongso')->where('idsanpham',$sp->id)->get(); ?>
                @foreach($thongso as $ts)
                    <?php  $anh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
                    @if(isset($anh))
                    <div class = "col-md-3">
                        <label>Ảnh chi tiết :</label>
                        </div>
                    <div class = "col-md-9">
                    
                        @foreach($anh as $hinh)
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $hinh->img }}" />
                        
                        
                        @endforeach
                    </div>
                    @endif
                    <div class = "col-md-3">
                        <label>Camera trước :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="cameratruoc"  value="{{ $ts->cameratruoc }}">MB
                        @if($errors->has('cameratruoc'))
                                <p style="color: red"> {{$errors->first('cameratruoc')}}</p>
                        @endif
                    </div>

                    <div class = "col-md-3">
                        <label>Camera sau :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="camerasau"  value="{{ $ts->camerasau }}">MB
                        @if($errors->has('camerasau'))
                                <p style="color: red"> {{$errors->first('camerasau')}}</p>
                        @endif
                    </div>

                    <div class = "col-md-3">
                        <label>Dung lượng :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number"  name="dungluong" value="{{ $ts->bonhotrong }}">GB
                        @if($errors->has('dungluong'))
                                <p style="color: red"> {{$errors->first('dungluong')}}</p>
                        @endif
                    </div>
                @endforeach
            
            @endif
            @if($sp->idloai==2)
            <div class = "col-md-3">
                        <label>Tên sản phẩm :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="tensanpham" value="{{ $sp->ten }}">
                        @if($errors->has('tensanpham'))
                                <p style="color: red"> {{$errors->first('tensanpham')}}</p>
                        @endif
                    </div>
                
                
                
                    <div class = "col-md-3">
                        <label>Ảnh đại diện :</label>
                        </div>
                    <div class = "col-md-9">
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $sp->avatar }}" />
                        
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Giá :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="gia" id="Gia" value="{{ $sp->gia }}" onchange="return check()">VNĐ
                        @if($errors->has('gia'))
                                <p style="color: red"> {{$errors->first('gia')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Khuyến mãi :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="khuyenmai" step="any" id="KM"  value="{{ $sp->khuyenmai }}" onchange="return checkkm()" > %
                       
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Mô Tả :</label>
                        </div>
                    <div class = "col-md-9">
                    <textarea cols="125" rows="10" charswidth="23" name="mota" style="resize:vertical">{{$sp->mota}}</textarea>
                    @if($errors->has('mota'))
                                <p style="color: red"> {{$errors->first('mota')}}</p>
                        @endif
                    </div>
                
                <?php $thongso = DB::table('thongso')->join('tslaptop','thongso.id','tslaptop.idthongso')->where('idsanpham',$sp->id)->get(); ?>
                @foreach($thongso as $ts)
                <?php  $anh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
                    @if(isset($anh))
                    <div class = "col-md-3">
                        <label>Ảnh chi tiết :</label>
                        </div>
                    <div class = "col-md-9">
                    
                        @foreach($anh as $hinh)
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $hinh->img }}" />
                       
                        
                        @endforeach
                    </div>
                    @endif
                    <div class = "col-md-3">
                        <label>Hệ điều hành :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="hedieuhanh" value="{{ $ts->hedieuhanh }}">
                        @if($errors->has('hedieuhanh'))
                                <p style="color: red"> {{$errors->first('hedieuhanh')}}</p>
                        @endif
                    </div>

                    <div class = "col-md-3">
                        <label>CPU :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="cpu"  value="{{ $ts->cpu }}">
                        @if($errors->has('cpu'))
                                <p style="color: red"> {{$errors->first('cpu')}}</p>
                        @endif
                    </div>

                    <div class = "col-md-3">
                        <label>Ram :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="number" name="ram"  value="{{ $ts->ram }}">GB
                        @if($errors->has('ram'))
                                <p style="color: red"> {{$errors->first('ram')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Ổ cứng :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="number"  name="ocung"  value="{{ $ts->ocung }}">GB
                        @if($errors->has('ocung'))
                                <p style="color: red"> {{$errors->first('ocung')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Màn hình :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="manhinh"  value="{{ $ts->manhinh }}">inch
                        @if($errors->has('manhinh'))
                                <p style="color: red"> {{$errors->first('manhinh')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Đồ họa :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="text" name="carddohoa"  value="{{ $ts->carddohoa }}">
                        @if($errors->has('carddohoa'))
                                <p style="color: red"> {{$errors->first('carddohoa')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Pin :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="pin"  value="{{ $ts->pin }}">Tiếng
                        @if($errors->has('pin'))
                                <p style="color: red"> {{$errors->first('pin')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Trọng lượng :</label>
                    </div>
                    <div class = "col-md-9">
                        <input type="number" step="any" name="trongluong"  value="{{ $ts->trongluong }}">Kg
                        @if($errors->has('trongluong'))
                                <p style="color: red"> {{$errors->first('trongluong')}}</p>
                        @endif
                    </div>
                @endforeach
            @endif
            @if($sp->idloai==3)
            <div class = "col-md-3">
                        <label>Tên sản phẩm :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="tensanpham" value="{{ $sp->ten }}">
                        @if($errors->has('tensanpham'))
                                <p style="color: red"> {{$errors->first('tensanpham')}}</p>
                        @endif
                    </div>
                
                
                
                    <div class = "col-md-3">
                        <label>Ảnh đại diện :</label>
                        </div>
                    <div class = "col-md-9">
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $sp->avatar }}" />
                       
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Giá :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="gia" id="Gia" value="{{ $sp->gia }}" onchange="return check()">VNĐ
                        @if($errors->has('gia'))
                                <p style="color: red"> {{$errors->first('gia')}}</p>
                        @endif
                    </div>
                    <div class = "col-md-3">
                        <label>Khuyến mãi :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="khuyenmai" step="any" id="KM" value="{{ $sp->khuyenmai }}" onchange="return checkkm()" > %
                       
                    </div>
                
                
                    <div class = "col-md-3">
                        <label>Mô Tả :</label>
                        </div>
                    <div class = "col-md-9">
                    <textarea cols="125" rows="10" charswidth="23" name="mota" style="resize:vertical">{{$sp->mota}}</textarea>
                    @if($errors->has('mota'))
                                <p style="color: red"> {{$errors->first('mota')}}</p>
                        @endif
                    </div>
                    <?php $thongso = DB::table('thongso')->join('tsmypham','thongso.id','tsmypham.idthongso')->where('idsanpham',$sp->id)->get(); ?>
                @foreach($thongso as $ts)
                <?php  $anh = DB::table('hinhanh')->where('idsanpham',$sp->id)->get(); ?>
                    @if(isset($anh))
                    <div class = "col-md-3">
                        <label>Ảnh chi tiết :</label>
                        </div>
                    <div class = "col-md-9">
                    
                        @foreach($anh as $hinh)
                        <img style="width: 10%; height: 10%;" src="images/sanpham/{{ $hinh->img }}" />
                        
                        
                        @endforeach
                    </div>
                    @endif
                    <div class = "col-md-3">
                        <label>Xuất xứ :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="text" name="xuatxu"  value="{{ $ts->xuatxu }}">
                        @if($errors->has('xuatxu'))
                                <p style="color: red"> {{$errors->first('xuatxu')}}</p>
                        @endif
                    </div>

                    <div class = "col-md-3">
                        <label>Trọng lượng :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="number" name="trongluong"  value="{{ $ts->trongluong }}">gram
                        @if($errors->has('trongluong'))
                                <p style="color: red"> {{$errors->first('trongluong')}}</p>
                        @endif
                    </div>
                @endforeach         
           @endif
            @endforeach
        </div>
        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn sửa không? Nếu có thay đổi sản phẩm này sẽ sang danh sách chờ duyệt')"  class="btn btn-black">
        Sửa
        </button>
    </div>
    
        
    </form>
    @endif
    <!-- Main Container Ends -->
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
    
    }
    function checkkm()
    {
        var vNumber = document.getElementById("KM");
        var a= vNumber.value;
        if(a < 0)
        {
            alert('vui lòng nhập số dương');
            return vNumber.value='';
        }
        if( a>99 )
        {
            alert('vui lòng nhập số nhỏ hơn 100');
            return vNumber.value='';
        }
    
    }
    
    

</script>
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