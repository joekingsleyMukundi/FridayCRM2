<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token"
		  content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch"
		  href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito"
		  rel="stylesheet">

	<!-- Scripts -->
	<link href="{{ asset('css/app.css') }}"
		  rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}"
		  rel="stylesheet">
	<link rel="stylesheet"
		  href="{{ asset('assets/libs/css/style.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}">
	<link rel="stylesheet"
		  href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand"
				   href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent"
						aria-expanded="false"
						aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse"
					 id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
						<!-- Authentication Links -->
						@guest
						@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link"
							   href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@endif

						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link"
							   href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown"
							   class="nav-link dropdown-toggle"
							   href="#"
							   role="button"
							   data-bs-toggle="dropdown"
							   aria-haspopup="true"
							   aria-expanded="false"
							   v-pre>
								{{ Auth::user()->name }}
							</a>

							<div class="dropdown-menu dropdown-menu-end"
								 aria-labelledby="navbarDropdown">
								<a class="dropdown-item"
								   href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form"
									  action="{{ route('logout') }}"
									  method="POST"
									  class="d-none">
									@csrf
								</form>
							</div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@yield('content')
		</main>
	</div>


	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"
			defer></script>

	<!-- jquery 3.3.1 -->
	{{-- <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script> --}}
	<!-- bootstap bundle js -->
	{{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script> --}}
	<!-- slimscroll js -->
	{{-- <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script> --}}
	<!-- main js -->
	{{-- <script src="{{ asset('assets/libs/js/main-js.js') }}"></script> --}}
	<!-- chart chartist js -->
	{{-- <script src="{{ asset('assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script> --}}
	<!-- sparkline js -->
	{{-- <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script> --}}
	<!-- morris js -->
	{{-- <script src="{{ asset('assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/vendor/charts/morris-bundle/morris.js') }}"></script> --}}
	<!-- chart c3 js -->
	{{-- <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets/libs/js/dashboard-ecommerce.js') }}"></script> --}}
</body>

</html>