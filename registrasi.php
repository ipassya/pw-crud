<?php 
	require 'functions.php';

	if (isset($_POST['register'])) {
		if (registrasi($_POST) > 0) {
			echo "<script>
					alert('user baru berhasil ditambahkan!');
				</script>";
		}
	} else {
		echo mysqli_error($conn);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
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
						Sign Up
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

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password2">
						<span class="focus-input100" data-placeholder="Konfirmasi Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="register">
								Daftar
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Sudah punya akun?
						</span>

						<a class="txt2" href="login.php">
							Login Sekarang!
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