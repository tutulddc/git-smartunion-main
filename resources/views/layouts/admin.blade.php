

        @include('layouts.backend_header')

        <!--**********************************
            Header Part End
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.backend_sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    @yield('content')
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.backend_footer')
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


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

        {{-- ------------for bootstrap data-table----------- --}}

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script> --}}


    {{-- <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script> --}}


    <!-- Add these lines before the closing body tag -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}




   <!-- Include jQuery and DataTables JS -->
   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
   {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script> --}}
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<!-- Chart piety plugin files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
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

@yield('footer_script')
</body>
</html>
