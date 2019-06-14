<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#0f75ff">
	<meta name="theme-color" content="#9d37f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- Title -->
	<title>Motgage Admin| Forgot-Password</title>
	<link rel="stylesheet" href="{{ asset('fonts/fonts/font-awesome.min.css') }}">

	<!-- Bootstrap Css -->
	<link href="{{ asset('plugins/bootstrap-4.1.3/css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="{{ asset('plugins/toggle-sidebar/sidemenu.css') }}" rel="stylesheet" />


	<!-- Dashboard css -->
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin-custom.css') }}" rel="stylesheet" />

	<!-- c3.js Charts Plugin -->
	<link href="{{ asset('plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

	<!---Font icons-->
	<link href="{{ asset('plugins/iconfonts/plugin.css') }}" rel="stylesheet" />

</head>
	<body>
		<div id="global-loader"><img src="{{ asset('images/other/loader.svg') }}" class="loader-img floating" alt=""></div>

		<!--Page-->
		<div class="page ">
			<div class="page-content z-index-10">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
							<div class="card mb-0">
								<div class="card-header">
									<h3 class="card-title">Forgot password</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label class="form-label text-dark" for="exampleInputEmail1">Email address</label>
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
									</div>
									<div class="form-footer">
										<button type="submit" class="btn btn-primary btn-block">Send</button>
									</div>
									<div class="text-center text-dark mt-3 ">
									Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Dashboard js -->
		<script src="{{ asset('js/vendors/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-4.1.3/popper.min.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-4.1.3/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/vendors/jquery.sparkline.min.js') }}"></script>
		<script src="{{ asset('js/vendors/selectize.min.js') }}"></script>
		<script src="{{ asset('js/vendors/jquery.tablesorter.min.js') }}"></script>
		<script src="{{ asset('js/vendors/circle-progress.min.js') }}"></script>
		<script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>
		<!-- Custom scroll bar Js-->
		<script src="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{ asset('plugins/toggle-sidebar/sidemenu.js') }}"></script>


		<!--Counters -->
		<script src="{{ asset('plugins/counters/counterup.min.js') }}"></script>
		<script src="{{ asset('plugins/counters/waypoints.min.js') }}"></script>

		<!-- Custom Js-->
		<script src="{{ asset('js/admin-custom.js') }}"></script>
	</body>
</html>