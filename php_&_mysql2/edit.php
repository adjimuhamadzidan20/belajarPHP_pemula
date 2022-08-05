<?php
	session_start();

	if (!isset($_SESSION['login'])) {

		header('Location: login.php');
		exit;
	}
	
	// import dari file functions.php 
	require 'functions.php';

	// ambil data dari URL
	$id = $_GET['id'];

	// query
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

	// mengecek button ditekan / tidak
	if ( isset($_POST['submit']) ) {

		// mengecek data telah terupdate / belum
		if (ubah($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil di update');
					document.location.href = 'index.php';
				</script>
			";
		}

		else {
			echo "
				<script>
					alert('data gagal di update');
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
	<h1>Ubah Data Mahasiswa</h1>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">

		<div class="nama">
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
		</div>
		<div class="nrp">
			<label for="nrp">NRP</label>
			<input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
		</div>
		<div class="email">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">	
		</div>
		<div class="jurusan">
			<label for="jurusan">Jurusan</label>
			<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
		</div>
		<div class="gambar">
			<label for="gambar">Gambar :</label><br>
			<img src="gambar/<?= $mhs['gambar'] ?>" alt="foto" width="100"><br>
			<input type="file" name="gambar" id="gambar">
		</div>
		<div class="btn">
			<button type="submit" name="submit">Ubah</button>
		</div>
	</form>
	<br>
	<center>
		<a href="index.php">Kembali</a>
	</center>
</body>
</html>