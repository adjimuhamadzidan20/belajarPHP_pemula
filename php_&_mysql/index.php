<?php 
	//koneksi ke database / manggil database
	$koneksi = mysqli_connect('localhost', 'root', '', 'phpdasar');

	//ambil data dari table mahasiswa / database php dasar
	$result = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');

	// ambil data (fetch) dari objek result
	// mysqli_fetch_row() = mengembalikan array numerik
	// mysqli_fetch_assoc() = mengembalikan array assosiative
	// mysqli_fetch_array() = mengembalikan keduanya
	// mysqli_fetch_object() = mengembalikan objek

	// while( $mhs = mysqli_fetch_assoc($result) ) {
	// 	var_dump($mhs);
	// }

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
		<?php while ($baris = mysqli_fetch_assoc($result)) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td>
					<a href="">Edit</a> | <a href="">Delete</a>
				</td>
				<td>
					<img src="img/<?php $baris['gambar']; ?>" alt="" width="100">
				</td>
				<td><?= $baris['nrp']; ?></td>
				<td><?= $baris['nama']; ?></td>
				<td><?= $baris['email']; ?></td>
				<td><?= $baris['jurusan']; ?></td>
			</tr>
			<?php $no++; ?>
		<?php endwhile; ?>
	</table>

</body>
</html>