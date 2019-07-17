<?php

session_start();

$_SESSION["err"] = "";
if (isset($_POST["submit"])) {

    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "solid";

    $connection_String = mysqli_connect($host, $user, $pass, $database);

    $username = mysqli_real_escape_string($connection_String, $username);
    $password = mysqli_real_escape_string($connection_String, $password);


    $get_current_user_details = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' LIMIT 1";
    $execute_user_details_command = mysqli_query($connection_String, $get_current_user_details);
    $get_additional_info = mysqli_fetch_assoc($execute_user_details_command);

    $users_last_name = $get_additional_info["user_lname"];
    $users_department = $get_additional_info["department"];
    $users_position = $get_additional_info["position"];


    $command_query = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' AND user_lname = '$users_last_name'";

    $execute_command_query = mysqli_query($connection_String, $command_query);

    $user_validity = mysqli_num_rows($execute_command_query);

    if ($user_validity > 0) {

        $checking_online_status = "SELECT * FROM users_online WHERE first_name='$username' AND last_name = '$users_last_name'";

        $execute_checking_online_status = mysqli_query($connection_String, $checking_online_status);

        $online_status_validity = mysqli_num_rows($execute_checking_online_status);

        if ($online_status_validity > 0) {

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
            setcookie("user_department", $users_department, time() + (86400 * 30));
            setcookie("user_position", $users_position, time() + (86400 * 30));

            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            $update_status_command =
                "UPDATE `users_online` SET status = 'online' WHERE first_name ='$username' AND last_name = '$users_last_name'";
            $execute_status_command = mysqli_query($connection_String, $update_status_command);


            header("Location:./Dashboard/Main_Dashboard.php");

        } else {

            $insert_command = "INSERT INTO users_online (`ID`, `first_name`,`last_name`, `Time`,`status`) VALUES (NULL, '$username','$users_last_name', CURRENT_TIMESTAMP,'online')";

            $execute_insert_command = mysqli_query($connection_String, $insert_command);

            $UserID = mysqli_insert_id($connection_String);

            mysqli_close($connection_String);

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
            setcookie("user_department", $users_department, time() + (86400 * 30));
            setcookie("user_position", $users_position, time() + (86400 * 30));

            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            header("Location:./Dashboard/Main_Dashboard.php");
        }

    } else {
        $_SESSION["err"] = "Wrong Username or Password";
    }
    ;
} else {

}
;

?>
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
					<button class="login100-form-btn" id="password" type='submit' value='LOGIN' name="submit" id="btnSubmit">
						Sign In
					</button>
				</div>
                <div class="text-center">
					<a href="users_signup.php" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>

			<!--<center><label id="lf--errormsg"><?php echo ($_SESSION["err"]); ?></label></center>-->
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