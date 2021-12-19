<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('login_css/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login_css/img/ctest1.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="POST" action="{{ route('password.update') }}">
					@csrf
					<span class="login100-form-title p-b-49">
						Reset Password
					</span>

					<input type="hidden" name="token" value="{{ $token }}">


					<div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your E-mail" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="email" autocomplete="email" autofocus>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                      
					</div >


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="password" placeholder="New password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                       		
					</div>
					<div>&nbsp;</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">New Password Confirm</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>

						
					</div> 
					&nbsp;
					@error('email')
					<span class="invalid-feedback" role="alert" style="color: red">
						<center> <strong>{{ $message }}</strong> </center>
					</span>
					@enderror
					@error('password')
					<span class="invalid-feedback" role="alert" style="color: red">
						<center> <strong>{{ $message }}</strong> </center>
					</span>
				@enderror 
				
					<div >
						&nbsp;
					</div>

					<div  >
						&nbsp;
					</div>
				
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login_css/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login_css/js/main.js') }}"></script>

</body>
</html>