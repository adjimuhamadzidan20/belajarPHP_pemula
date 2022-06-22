<?php  
	// menangkap button submit
	if( isset($_POST['submit'])) {
		// mengecek username & password sama / tidak
		if($_POST['username'] == 'adji123' && $_POST['password'] == 'pass123') {
			// jika sama masuk ke halaman dashbord
			header('Location: dashbord.php');
			exit;
		}

		// jika tidak sama user & pass invalid
		else {
			$invalid = true;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<style>
		h1 {
			text-align: center;
			margin-top: 100px;
		}

		form {
			background-color: lightgrey;
			width: 15%;
			padding: 20px;
			margin: auto;
		}
	</style>
</head>
<body>
	<h1>Form Login</h1>

	<?php if( isset($invalid) ) : ?>
		<p style="text-align: center; font-style: italic;">username or password invalid!</p>
	<?php endif; ?>

	<form method="post">
		<label for="nama">Username</label>
		<br>
		<input type="text" placeholder="Username" id="nama" name="username" required>
		<br><br>
		<label for="pass">Password</label>
		<br>
		<input type="password" placeholder="Password" id="pass" name="password" required>
		<br><br>
		<input type="submit" name="submit">
		<input type="reset">
	</form>	
</body>
</html>