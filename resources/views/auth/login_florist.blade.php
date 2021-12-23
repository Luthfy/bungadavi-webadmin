<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Betler Multipurpose Forms HTML Template">
    <meta name="author" content="Ansonika">
    <title><?= $title ?? config('app.name') ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="theme_client/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="theme_client/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="theme_client/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="theme_client/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="theme_client/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('theme_client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_client/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_client/css/style.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('theme_client/css/custom.css') }}" rel="stylesheet">
</head>

<body>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->

	<div class="container-fluid p-0">
	    <div class="row no-gutters row-height">
	        <div class="col-lg-6 background-image" data-background="{{url('theme_client/img/bg.jpg')}}">
	            <div class="content-left-wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
	                <a href="{{ 'login-florist' }}" id="logo"><img src="{{url('theme_client/img/bungadavi-logo.png')}}" alt="" width="200" height="70"></a>

	                <div>
	                    <h1>Bunga Davi</h1>
	                    <p>Perpaduan sempurna antara kreativitas, energi, komunikasi, kebahagiaan, dan cinta. Biarkan kami mengatur senyum untuk Anda.</p>

	                </div>
	            </div>
	        </div>
	        <div class="col-lg-6 d-flex flex-column content-right">
	            <div class="container my-auto py-5">
	                <div class="row">
	                    <div class="col-lg-9 col-xl-7 mx-auto">
	                        <h4 class="mb-3 text-center">Login Florist</h4>
	                        <form class="input_style_1" method="post">

								<div class="divider"></div>
	                            <div class="form-group">
	                                <label for="email_address">Email Address</label>
	                                <input type="email" name="email_address" id="email_address" class="form-control">
	                            </div>
	                            <div class="form-group">
	                                <label for="password">Password</label>
	                                <input type="password" name="password" id="password" class="form-control">
	                            </div>
	                            <div class="clearfix mb-3">
	                                <div class="float-left">
	                                    <label class="container_check">Remember Me
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="float-right">
	                                    <a id="forgot" href="javascript:void(0);">Lupa Password ?</a>
	                                </div>
	                            </div>
	                            <button type="submit" class="btn_1 full-width">Login</button>
	                        </form>

	                        <form class="input_style_1" method="post">
	                            <div id="forgot_pw">
	                                <h4 class="mb-3 text-center">Forgot Password</h4>
	                                <div class="form-group">
	                                    <label for="email_forgot">Login email</label>
	                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
	                                </div>
	                                <p>Anda akan menerima email yang berisi tautan yang memungkinkan Anda untuk mengatur ulang kata sandi Anda ke kata sandi pilihan baru.</p>
	                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
	                            </div>
	                        </form>

	                    </div>
	                </div>
	            </div>
	            <div class="container pb-3 copy">© 2021 Bungadavi.co.id - All Rights Reserved.</div>
	        </div>
	    </div>
	    <!-- /row -->
	</div>
	<!-- /container -->

	<!-- COMMON SCRIPTS -->
    <script src="{{ asset('theme_client/js/common_scripts.js') }}"></script>
	<script src="{{ asset('theme_client/js/common_func.js') }}"></script>

</body>
</html>
