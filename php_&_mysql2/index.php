<?php 
	// import dari file functions.php
	require 'functions.php';

	session_start();

	if (!isset($_SESSION['login'])) {

		header('Location: login.php');
		exit;
	}

	// pagination - konfigurasi
	$jumlahDataHal = 2;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHal = ceil($jumlahData / $jumlahDataHal) + 1;

	// menangkap halaman aktif
	$posisiHalaman = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
	// hal 1 = awal 0 sd 1
	// hal 2 = awal 2 sd 3
	// hal 3 = awal 4 sd 5
	// hal 4 = awal 6 sd 7

	// menentukan data awal
	$awaldata = ($jumlahDataHal * $posisiHalaman) - $jumlahDataHal;

	$mhs = query("SELECT * FROM mahasiswa LIMIT $awaldata, $jumlahDataHal");

	// pencarian
	if (isset($_POST['search'])) {
		$mhs = cari($_POST['input-search']);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>

	<style>
		@media print {
			.logout, .tambah-data, .cari, .paginasi, .aksi {
				display: none;
			}
		}	

	</style>
</head>
<body>
	<a href="logout.php" class="logout">log out</a>

	<h1>Data Mahasiswa</h1>

	<a href="tambah.php" class="tambah-data">Tambah Data Mahasiswa</a>
	<br><br>

	<form method="post" class="cari">
		<input type="text" name="input-search" autofocus placeholder="Cari data" autocomplete="off">
		<button type="submit" name="search">Cari</button>
	</form>
	<br>

	<!-- navigasi / pagination -->
	<div class="paginasi">
		<!-- arah panah -->
		<?php if ($posisiHalaman > 1) { ?>

			<a href="?halaman=<?= $posisiHalaman - 1 ?>">&laquo;</a>
		
		<?php } ?>

		<!-- no halaman / paginasi -->
		<?php for ($i = 1; $i < $jumlahHal; $i++) : ?>
			<?php if ($i == $posisiHalaman) : ?>
				
				<a href="?halaman=<?= $i; ?>" style="background-color: grey; color: white; padding: 1px;"><?= $i; ?></a>
			
			<?php else : ?>
		
				<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>

			<?php endif; ?>
		<?php endfor; ?>

		<!-- arah panah -->
		<?php if ($posisiHalaman < $jumlahHal) { ?>

			<a href="?halaman=<?= $posisiHalaman + 1 ?>">&raquo;</a>
		
		<?php } ?>
	</div>
	

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No.</th>
			<th class="aksi">Aksi</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $no = 1; ?>
		<?php foreach($mhs as $baris) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td class="aksi">
					<a href="edit.php?id=<?= $baris['id']; ?>">Edit</a> | 
					<a href="hapus.php?id=<?= $baris['id']; ?>" onclick="return confirm('yakin?');">Delete</a>
				</td>
				<td>
					<img src="gambar/<?= $baris['gambar']; ?>" alt="foto" width="50">
				</td>
				<td><?= $baris['nrp']; ?></td>
				<td><?= $baris['nama']; ?></td>
				<td><?= $baris['email']; ?></td>
				<td><?= $baris['jurusan']; ?></td>
			</tr>
			<?php $no++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>