<?php  
	session_start();
	require 'functions.php';

	// cek cookie 
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		// ambil username berdasarkan id
		$sql = "SELECT username FROM user WHERE id = $id";

		$result = mysqli_query($koneksi, $sql);
		$row = mysqli_fetch_assoc($result);

		// cek cookie & username
		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
		}
	}

	// session (mencegah masuk ke hal index)
	if (isset($_SESSION['login'])) {

		header('Location: index.php');
		exit;
	}

	// menangkap button submit
	if( isset($_POST['submit'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$hasil = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

		// cek username 
		if (mysqli_num_rows($hasil) === 1) {
			
			// cek password
			$row = mysqli_fetch_assoc($hasil);
			if (password_verify($password, $row['password'])) {

				// set session
				$_SESSION['login'] = true;

				// cek remember me
				if (isset($_POST['remember'])) {
					
					// buat cookie
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['username']), time()+60);
				}

				// masuk ke halaman index
			 	header('Location: index.php');
			 	exit;
			} 
		}

		else {
			echo "username & password invalid!";
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

		form .username, .password, .remember, .link-reg {
			margin-bottom: 10px;
			cursor: pointer;
		}

		form #nama, #pass {
			width: 100%;
			padding: 5px;
		}

		.submit, .reset {
			padding: 5px;
			cursor: pointer;
		}

		.remember label {
			font-size: 14px;
		}

		.link-reg a {
			font-size: 12px;
			color: black;
		}

	</style>
</head>
<body>
	<h1>Login</h1>
	<form method="post">
		<div class="username">
			<label for="nama">Username</label><br>
			<input type="text" placeholder="Username" id="nama" name="username" required>
		</div>
		<div class="password">
			<label for="pass">Password</label><br>
			<input type="password" placeholder="Password" id="pass" name="password" required>
		</div>
		<div class="remember">
			<label for="pass">Remember Me</label>
			<input type="checkbox" id="remember" name="remember">	
		</div>
		<div class="link-reg">
			<a href="registrasi.php">Belum memiliki akun?</a>
		</div>
		<div class="btn">
			<input type="submit" name="submit" class="submit">
			<input type="reset" class="reset">
		</div>
	</form>
</body>
</html>