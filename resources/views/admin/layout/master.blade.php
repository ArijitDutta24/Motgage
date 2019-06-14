<!doctype html>
<html lang="en" dir="ltr">
	<head>
		@include('admin.partial.header')
	</head>
	<body class="app sidebar-mini">
		<div id="global-loader"><img src="{{ asset('images/other/loader.svg') }}" class="loader-img floating" alt=""></div>
		<div class="page">
			<div class="page-main">
				@include('admin.partial.nav-bar')
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				
				@include('admin.partial.side-bar')

				@yield('content')
			</div>

			<!--footer-->
				@include('admin.partial.footer')
			<!-- End Footer-->
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>


		<!-- Dashboard Core -->
		@include('admin.partial.script')

	</body>
</html>