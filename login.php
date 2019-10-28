<?php
	session_start();
	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}

	require 'functions.php';

	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

		// cek email
		if (mysqli_num_rows($result) === 1) {
			// cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				// set session
				$_SESSION["login"] = true;

				header("Location: index.php");
				exit;
			} else {
				echo "<script>
					alert('email / password tidak sesuai!')
				</script>";
			}
		} else {
				echo "<script>
					alert('email / password tidak sesuai!')
				</script>";
		}

		$error = true;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="style/css/util.css">
	<link rel="stylesheet" type="text/css" href="style/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="login">
								Masuk
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Ingin mendaftar?
						</span>

						<a class="txt2" href="registrasi.php">
							Daftar Sekarang!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	<script src="style/js/jquery-3.2.1.min.js"></script>
	<script src="style/js/main.js"></script>

</body>
</html>