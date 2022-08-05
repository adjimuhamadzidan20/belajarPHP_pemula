<?php 
	// array assosiative = key array yang kita buat sendiri bertipe string
	$mahasiswa = [
		[
			'nama' => 'Mahasiswa1', 
			'NPM' => 201943501940, 
			'Kelas' => 'R5X', 
			'Prodi' => 'Teknik Informatika'
		],
		[
			'nama' => 'Mahasiswa2', 
			'NPM' => 201943501940, 
			'Kelas' => 'R5X', 
			'Prodi' => 'Teknik Informatika'
		],
		[
			'nama' => 'Mahasiswa3', 
			'NPM' => 201943501940, 
			'Kelas' => 'R5X', 
			'Prodi' => 'Teknik Informatika'
		]
	];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>array assosiative</title>

</head>
<body>
	<h1>Data Mahasiswa</h1>

	<?php foreach($mahasiswa as $a) : ?>
		<ul style="list-style-type: square;">
			<li>Nama 	<?= $a['nama'];?></li>
			<li>NPM 	<?= $a['NPM'];?></li>
			<li>Kelas 	<?= $a['Kelas'];?></li>
			<li>Prodi 	<?= $a['Prodi'];?></li>
		</ul>
	<?php endforeach; ?>

</body>
</html>