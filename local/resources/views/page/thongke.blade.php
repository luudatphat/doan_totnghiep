
@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->
    <div class="col-sm-12">
    <h2 class="product-head">Thống kê</h2>
	</div>
    <form class="form-group" method="post" action="{!! url('doanhthu',Auth::user()->id) !!}" enctype="multipart/form-data" >
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="col-sm-12">
                    <div class = "col-md-3">
                        <label>Từ :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="date" name="form">
                    </div>
                    <div class = "col-md-3">
                        <label>Đến :</label>
                        </div>
                    <div class = "col-md-9">
                        <input type="date" name="to">
                    </div>
                    <input type = "submit">
        </div>
    </form>
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
</body>
</html>
@endsection