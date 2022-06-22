<?php 
	// import dari file functions.php
	require 'functions.php';

	$mhs = query("SELECT * FROM mahasiswa");

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
</head>
<body>
	<h1>Data Mahasiswa</h1>

	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form method="post">
		<input type="text" name="input-search" autofocus placeholder="Cari data" autocomplete="off">
		<button type="submit" name="search">Cari</button>
	</form>
	<br>

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
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
				<td>
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