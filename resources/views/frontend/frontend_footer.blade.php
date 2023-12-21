
<hr class="divider-d">
<footer class="footer bg-dark">
<div class="container">
<div class="row">
<div class="col-sm-6">
<p class="copyright font-alt">&copy; 2023&nbsp;<a href="index.html">স্মার্ট ইউনিয়ন ম্যানেজমেন্ট</a>, All Rights Reserved</p>
</div>
<div class="col-sm-6">
<div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
</div>
</div>
</div>
</div>
</footer>
</div>
<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
</main>
<!--
JavaScripts
=============================================
-->
<script src="{{asset('frontend')}}/lib/jquery/dist/jquery.js"></script>
<script src="{{asset('frontend')}}/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/lib/wow/dist/wow.js"></script>
<script src="{{asset('frontend')}}/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
<script src="{{asset('frontend')}}/lib/isotope/dist/isotope.pkgd.js"></script>
<script src="{{asset('frontend')}}/lib/imagesloaded/imagesloaded.pkgd.js"></script>
<script src="{{asset('frontend')}}/lib/flexslider/jquery.flexslider.js"></script>
<script src="{{asset('frontend')}}/lib/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/lib/smoothscroll.js"></script>
<script src="{{asset('frontend')}}/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
<script src="{{asset('frontend')}}/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
<script src="{{asset('frontend')}}/js/plugins.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>

<script type="text/javascript">
function Admin() {
// window.location.href = "admin_login.blade.php";
    window.location.href = "{{URL::to('adminlogin')}}"
}
</script>
</body>
</html>
