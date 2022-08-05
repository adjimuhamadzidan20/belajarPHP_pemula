<?php
	// import dari file functions.php 
	require 'functions.php';
	
	session_start();
	// session (mencegah masuk ke hal login)
	if (!isset($_SESSION['login'])) {

		header('Location: login.php');
		exit;
	}

	// mengecek button ditekan / tidak
	if ( isset($_POST['submit']) ) {

		// mengecek data telah terkirim / belum
		if (tambah($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil di add');
					document.location.href = 'index.php';
				</script>
			";
		}

		else {
			echo "
				<script>
					alert('data gagal di add');
					document.location.href = 'index.php';
				</script>
			";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Mahasiswa</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h1 {
			text-align: center;
			margin-top: 40px;
			margin-bottom: 20px;
		}

		form {
			background-color: lightgrey;
			width: 30%;
			padding: 20px;
			margin: auto;
		}

		form .nama, .nrp, .email, .jurusan, .gambar {
			margin-bottom: 10px;
			cursor: pointer;
		}

		form #nama, #nrp, #email, #jurusan, #gambar {
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
	<h1>Tambah Data Mahasiswa</h1>
	<form method="post" enctype="multipart/form-data">
		<div class="nama">
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" required>
		</div>
		<div class="nrp">
			<label for="nrp">NRP</label>
			<input type="text" name="nrp" id="nrp" required>
		</div>
		<div class="email">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" required>	
		</div>
		<div class="jurusan">
			<label for="jurusan">Jurusan</label>
			<input type="text" name="jurusan" id="jurusan" required>
		</div>
		<div class="gambar">
			<label for="gambar">Gambar</label>
			<input type="file" name="gambar" id="gambar">
		</div>
		<div class="btn">
			<button type="submit" name="submit">Tambah</button>
		</div>
	</form>
	<br>
	<center>
		<a href="index.php">Kembali</a>
	</center>
</body>
</html>