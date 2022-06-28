<?php  
	require '../functions.php';

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

				// masuk ke halaman index
			 	header('Location: ../index.php');
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
	<h1>Login</h1>

	<form method="post">
		<label for="nama">Username</label><br>
		<input type="text" placeholder="Username" id="nama" name="username" required><br><br>
		<label for="pass">Password</label><br>
		<input type="password" placeholder="Password" id="pass" name="password" required><br><br>
		<center>
			<input type="submit" name="submit">
			<input type="reset">
		</center>
	</form>	
</body>
</html>