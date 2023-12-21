<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>স্মার্ট ইউনিয়ন মানাজমেন্ট সিস্টেম</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
	<link rel="stylesheet" href="{{ asset('backend') }}/vendor/chartist/css/chartist.min.css">
    <link href="{{ asset('backend') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>


<body>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<form class="form-horizontal" action="{{ route('admin.login.confirm') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="department" value="{{ $users_info->department }}">
                            </div>
						  {{-- <div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="email" placeholder="Enter email">
							</div>
						  </div> --}}
						  <div class="form-group">
							<label class="control-label col-sm-2" for="email">Name:</label>
							<div class="col-sm-10">
                                <input type="text" name="name" class="form-control" >
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2" for="pwd">Password:</label>
							<div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
							</div>
							<div class="col-sm-10">
                                @if (session('exist'))
                                    <div class="alert alert-danger">{{ session('exist') }}</div>
                                 @endif
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label><input type="checkbox"> Remember me</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-default">Submit</button>
							</div>
						  </div>
						</form>
					</div>
				</div>
            </div>
        </div>
</body>



    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('backend') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{ asset('backend') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom.min.js"></script>
	<script src="{{ asset('backend') }}/js/deznav-init.js"></script>
	<script src="{{ asset('backend') }}/vendor/owl-carousel/owl.carousel.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{ asset('backend') }}/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="{{ asset('backend') }}/vendor/apexchart/apexchart.js"></script>

    //sweet alert
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Dashboard 1 -->
	<script src="{{ asset('backend') }}/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>


</body>
</html>
