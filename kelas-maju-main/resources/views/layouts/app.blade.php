<!DOCTYPE html>
<html lang="zxx" class="js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="AppsLand is a powerful App Landing HTML Template with full of customization options and features">

		<!-- Site Title  -->
		<title>@yield("title")</title>
		<!-- Vendor Bundle CSS -->
		<link rel="stylesheet" href="assets/css/vendor.bundlec302.css?ver=130" >
		<!-- Custom styles for this template -->
		<link href="assets/css/stylec302.css?ver=130" rel="stylesheet">
		<link href="assets/css/theme-purplec302.css?ver=130" rel="stylesheet" id="layoutstyle">
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-91615293-2', 'auto');
		ga('send', 'pageview');
		</script>
	</head>
	<body class="overflow-scroll">

		<!-- Start .header-section -->
		<div id="home" class="header-section flex-box-middle section gradiant-background  background-circles header-software">
			<div id="particles-js" class="particles-container"></div>


			<div class="header-content pt-80">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-8 col-md-offset-2">
							<div class="header-texts">
								<h1 class="cd-headline clip is-full-width wow fadeInUp" data-wow-duration="1s">
									<span>KelasMaju </span>
									<span class="cd-words-wrapper">
										<b class="is-visible">Web Manajemen Kelas</b>

									</span>
								</h1>
								@if (!Auth::user())
								<ul class="buttons">
									<li><a href="{{route("login")}}" class="button button-border button-transparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s">Login</a></li>
								</ul>
								@else
								<ul class="buttons">
									<li><a href="{{route("dashboard")}}" class="button button-border button-transparent wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s">Hi, {{Auth::user()->name}}</a></li>
								</ul>
								@endif
							</div>
						</div><!-- .col -->
					</div><!-- .row -->
					{{-- <div class="row text-center">
						<div class="col-md-10 col-md-offset-1">

						</div>
					</div> --}}
				</div><!-- .container -->
			</div><!-- .header-content -->
		</div><!-- .header-section -->




		<!-- Preloader !remove please if you do not want -->
		{{-- <div id="preloader"><div id="status">&nbsp;</div></div> --}}
		<!-- Preloader End -->

		<!-- Google Map Script -->
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g"></script>
		<script src="assets/js/googleMapc302.js?ver=130"></script>

		<!-- JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<script src="assets/js/jquery.bundlec302.js?ver=130"></script>
		<script src="assets/js/scriptc302.js?ver=130"></script>

	</body>
</html>
