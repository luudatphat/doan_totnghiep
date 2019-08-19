@extends('masterkenhnguoiban')
@section('content')
<!-- Header Section Ends -->


	<!-- Main Container Starts -->

<div id="main-container" class="container">

	@if(isset($thongbao))
		<div class="alert alert-success">
			{{$thongbao}}
		</div>
	@endif

</div>

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