<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
		<meta name="keywords" content="">
        <meta name="author" content="radiation-tech - luthfy">
        <meta name="robots" content="noindex, nofollow">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Dashboard - Bunga Davi</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme_be/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('theme_be/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme_be/css/bootstrap-datetimepicker.min.css') }}">

        <!-- Datatables -->
        <link rel="stylesheet" href="{{ asset('theme_be/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('theme_be/css/font-awesome.min.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}"> --}}

		<!-- Lineawesome CSS -->
        {{-- <link rel="stylesheet" href="{{asset('theme_be/css/line-awesome.min.css')}}"> --}}
        {{-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"> --}}

        <!-- SELECT2 CSS -->
		<link rel="stylesheet" href="{{asset('theme_be/css/select2.min.css')}}">

        <!-- SWEETALERT -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- FULLCALENDER CSS -->
		<link rel="stylesheet" href="{{asset('theme_be/css/fullcalendar.min.css')}}">

		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{asset('theme_be/plugins/morris/morris.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('theme_be/css/style.css')}}">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="theme_be/js/html5shiv.min.js"></script>
			<script src="theme_be/js/respond.min.js"></script>
		<![endif]-->
    </head>

    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="{{ url('/') }}" class="logo">
						<img src="{{asset("img/bungadavi-logo.png")}}" height="40" alt="">
					</a>
                </div>
				<!-- /Logo -->

				{{-- <a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a> --}}

				<!-- Header Title -->
                {{-- <div class="page-title-box">
					<h3>BUNGA DAVI</h3>
                </div> --}}
				<!-- /Header Title -->

				{{-- <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a> --}}

				<!-- Header Menu -->
				<ul class="nav user-menu">
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{ asset('theme_be/img/profiles/avatar-21.jpg') }}" alt="">
							<span class="status online"></span></span>
							<span>Admin</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ url('admin/profile') }}">My Profile</a>
							<a class="dropdown-item" href="{{ url('admin/setting') }}">Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
					</div>

				</div>
				<!-- /Mobile Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
                        @if (auth()->user()->hasRole('superadmin'))
                            @include('layouts.menu_bungadavi')
                            <hr>
                            @include('layouts.menu_florist')
                            <hr>
                            @include('layouts.menu_corporate')
						@elseif (auth()->user()->hasRole('bungadavi'))
                            @include('layouts.menu_bungadavi')
                        @elseif (auth()->user()->hasRole('affiliate'))
                            @include('layouts.menu_florist')
                        @elseif (auth()->user()->hasRole('corporate'))
                            @include('layouts.menu_corporate')
                        @endif
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				@yield('body')

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{asset('theme_be/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('theme_be/js/popper.min.js')}}"></script>
        <script src="{{asset('theme_be/js/bootstrap.min.js')}}"></script>

		<!-- Slimscroll JS -->
		<script src="{{asset('theme_be/js/jquery.slimscroll.min.js')}}"></script>

        <script src="{{asset('theme_be/js/select2.min.js')}}"></script>

        @stack('js')

		<!-- Custom JS -->
		<script src="{{asset('theme_be/js/app.js')}}"></script>
		<script src="{{asset('js/script.js')}}"></script>

    </body>
</html>
