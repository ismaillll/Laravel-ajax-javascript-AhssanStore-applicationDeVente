<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<div   class="login100-form-avatar text-align: center">
					<p style="text-align:center;"><img src="{{ URL::to('/') }}/images/ismail.jpg" class="w3-circle"  alt="AVATAR"></p></br></br></br>
					</div>

				<form class="login100-form validate-form"  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
					@csrf

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
						@if ($errors->has('email'))
					 		 <span class="invalid-feedback" role="alert">
					 				 <strong>{{ $errors->first('email') }}</strong>
					 		 </span>
					  @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
						@if ($errors->has('password'))
					 		 <span class="invalid-feedback" role="alert">
					 				 <strong>{{ $errors->first('password') }}</strong>
					 		 </span>
					  @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Ou Login Avec
						</span>
					</div>

					<a href="#" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							 Copyright © Ahssan Store Tous droits réservés.
						</span>

					<!--	<a class="txt1 bo1 hov1" href="#">
							Sign up now
						</a>-->
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
