<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Nozha admin panel</title>
	<meta name="description" content="nozha admin panel fully support rtl with complete dark mode css to use. ">
	<meta name=”robots” content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
	<link rel="manifest" href="./img/favicon/site.webmanifest">
	<link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="theme-color" content="#ffffff">
	<!-- Place favicon.ico in the root directory -->
	<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
	<link href="{{ asset('frontend/css/fontawsome/all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet"
		href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
		integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
</head>
<body class="">
	<div class="bmd-layout-container bmd-drawer-f-l avam-container animated ">
		<main class="bmd-layout-content">
			<div class="container-fluid">
				<div class="main_wrapper">
                    <!-- form -->
                    <div class="row ">
                        <div class="col-md-5 card shade mw-center mh-center">
                            <img src="{{ asset('frontend/svg/logo.svg') }}" alt="..." class="mw-center " height="130" width="300" >
                            <hr class="hr-dashed m-0">
                            <form action="{{ route('login_admin') }}" method="post">
								@csrf
                                <div class="form-group m-0">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Enter email">
										@if(session('error_username'))
											<div class="alert alert-danger">
												{!! session('error_username') !!}
											</div>
										@endif
                                </div>
                                <div class="form-group m-0">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" name="password">
										@if(session('error_password'))
											<div class="alert alert-danger">
												{!! session('error_password') !!}
											</div>
										@endif
                                </div>
                                <div class="form-check pt-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn shade f-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!--  -->
				</div>
			</div>
		</main>
	</div>
	</div>
	<script src="{{ asset('frontend/js/vendor/modernizr.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script>
		window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')
	</script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
		integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
		integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
		$(document).ready(function () {
			$('body').bootstrapMaterialDesign();
		});
	</script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
</body>
</html>