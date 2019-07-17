<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Chat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"
	<link rel="icon" type="image/png" href="resources/Login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="resources/Login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/vendor/animsition/css/animsition.min.css">	
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="resources/Login/css/main.css">
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('resources/Login/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="txtUsername"name="username" placeholder="username">
					<span class="focus-input100"></span>

				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" id="username" type="password" name="txtPassword" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" id="password" type='submit' value='LOGIN' name="submit" id="btnSubmit">>
						Sign In
					</button>
				</div>
                <div class="text-center">
					<a href="#" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>

			<label id="lf--errormsg"><?php echo ($_SESSION["err"]); ?></label>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
	<script src="resources/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="resources/Login/vendor/animsition/js/animsition.min.js"></script>
	<script src="resources/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="resources/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="resources/Login/vendor/select2/select2.min.js"></script>
	<script src="resources/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="resources/Login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="resources/Login/vendor/countdowntime/countdowntime.js"></script>
	<script src="resources/Login/js/main.js"></script>

</body>
</html>