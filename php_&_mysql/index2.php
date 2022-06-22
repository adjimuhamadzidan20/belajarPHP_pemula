<?php 
	// import dari file functions.php
	require 'functions.php';

	$mhs = query('SELECT * FROM mahasiswa');

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
					<a href="">Edit</a> | <a href="">Delete</a>
				</td>
				<td>
					<img src="../img/thumb2.jpg" alt="foto" width="100">
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