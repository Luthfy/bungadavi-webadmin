<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Bungadavi</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme_be/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('theme_be/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('theme_be/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('theme_be/css/style.css') }}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="theme_be/js/html5shiv.min.js"></script>
			<script src="theme_be/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">

				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<a href="{{ url('/') }}"><img src="{{ asset('img/bungadavi-logo.png') }}" alt="bungadavi Technologies" style="min-width: 280px;"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Account Form -->
                            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="text" type="email" name="email" required autofocus>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											{{-- <a class="text-muted" href="{{ route('password.request') }}">
												Forgot password?
											</a> --}}
										</div>
									</div>
									<input class="form-control" type="password" name="password" required autocomplete="current-password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								<div class="account-footer">
									{{-- <p>Don't have an account yet? <a href="register.html">Register</a></p> --}}
								</div>
							{!! Form::close() !!}
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('theme_be/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('theme_be/js/popper.min.js') }}"></script>
        <script src="{{ asset('theme_be/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('theme_be/js/app.js') }}"></script>

    </body>
</html>
