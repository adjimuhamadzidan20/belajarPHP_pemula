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
</head>
<body>
	<blockquote><br>
		<h1>Registrasi</h1>
		<form action="" method="post">
			<label for="username">Username</label><br>
			<input type="text" name="username" id="username">
			<br><br>
			<label for="password">Password</label>
			<br>
			<input type="password" name="password" id="password">
			<br><br>
			<label for="confirm-pass">Confirm Password</label>
			<br>
			<input type="password" name="confirm-pass" id="confirm-pass">
			<br><br>
			<button type="submit" name="register">Sign Up</button>
		</form>
	</blockquote>
</body>
</html>