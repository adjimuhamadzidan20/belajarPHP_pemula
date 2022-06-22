<?php
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
		ul li {
			margin-bottom: 20px;
			list-style-type: none;
		}
	</style>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">

		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
			</li>
			<li>
				<label for="nrp">NRP</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label><br>
				<img src="gambar/<?= $mhs['gambar'] ?>" alt="foto" width="100"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah</button>
			</li>
		</ul>
	</form>

	<a href="index.php">kembali</a>
</body>
</html>