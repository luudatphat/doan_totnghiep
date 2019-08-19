@extends('master')
@section('content')
	
			<div class="col-md-9">
            <div class="panel-heading">
							<h3 class="panel-title">Thông tin đăng ký</h3>
			</div>
			<!-- Breadcrumb Starts -->
            @if(isset($thongbao))
                <div class="alert alert-success">
                    {{$thongbao}}
                </div>
            @endif
            @if(Auth::user()->shop==0)
			<div class="panel-body">
                <form class="form-horizontal"  method="post" action="{{route('dangkyshop')}}" role="form" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <table>
                        <tr>
                            <td>Số Chứng minh nhân dân</td>
                            <td><input type="number" name="socmnd" id="Socm" onchange="return check()" ></td>
                            @if($errors->has('socmnd'))
								<p style="color: red"> {{$errors->first('socmnd')}}</p>
						    @endif
                        </tr>
                        <tr>
                            <td>Ảnh chứng minh nhân dân<br><p style="color:red;">Ảnh mặt trước và chụp rõ số&nbsp;</p></td>
                            <td><input type="file" name="anhcmnd"></td>
                            @if($errors->has('anhcmnd'))
								<p style="color: red"> {{$errors->first('anhcmnd')}}</p>
						    @endif
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" >Đăng ký</button></td>
                        </tr>
                    </table>
                </form>
             </div>	 
			</div>
        @else
            <div class="alert alert-success">Bạn đã gửi hồ sơ đăng kí , vui lòng bạn chờ đợi admin xét duyệt xin cám ơn</div>
        @endif
			
<script>
function check()
	{
	var vNumber = document.getElementById("Socm");
	var a= vNumber.value;
	if(a < 0)
	{
		alert('vui lòng nhập số dương');
		return vNumber.value='';
	}
	
	}
    
</script>		
@endsection
