<?php 
	require 'functions.php';

	if ( isset($_POST['register']) ) {

		if (registrasi($_POST) > 0) {
			echo "Registrasi berhasil!";
		} 

		else {
			echo mysqli_error($koneksi);
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h1 {
			text-align: center;
			margin-top: 100px;
			margin-bottom: 20px;
		}

		form {
			background-color: lightgrey;
			width: 30%;
			padding: 20px;
			margin: auto;
		}

		form .username, .password, .confirm {
			margin-bottom: 10px;
			cursor: pointer;
		}

		form #nama, #pass, #confirm-pass {
			width: 100%;
			padding: 5px;
		}

		button {
			padding: 5px;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<h1>Registrasi</h1>
	<form method="post">
		<div class="username">
			<label for="nama">Username</label><br>
			<input type="text" placeholder="Username" id="nama" name="username" required>
		</div>
		<div class="password">
			<label for="pass">Password</label><br>
			<input type="password" placeholder="Password" id="pass" name="password" required>
		</div>
		<div class="confirm">
			<label for="confirm-pass">Confirm Password</label><br>
			<input type="password" name="confirm-pass" id="confirm-pass" placeholder="Confirm Password">	
		</div>
		<div class="btn">
			<button type="submit" name="register">Sign Up</button>
		</div>
	</form>
</body>
</html>