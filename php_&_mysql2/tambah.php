<?php
	// import dari file functions.php 
	require 'functions.php';

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
		ul li {
			margin-bottom: 20px;
			list-style-type: none;
		}
	</style>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="nrp">NRP</label>
				<input type="text" name="nrp" id="nrp" required>
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" required>
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="gambar">Gambar</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah</button>
			</li>
		</ul>
	</form>

	<a href="index.php">kembali</a>
</body>
</html>