<?php 
	$mahasiswa = [
		[
			'nama' => 'Mahasiswa1', 
			'NPM' => 201943501940, 
			'Kelas' => 'R5X', 
			'Prodi' => 'Teknik Informatika',
			'foto' => 'img/thumb2.jpg'

		],
		[
			'nama' => 'Mahasiswa2', 
			'NPM' => 201943501999, 
			'Kelas' => 'R1J', 
			'Prodi' => 'Teknik Industri',
			'foto' => 'img/thumb2.jpg'
		],
		[
			'nama' => 'Mahasiswa3', 
			'NPM' => 201943501996, 
			'Kelas' => 'R8G', 
			'Prodi' => 'Arsitektur',
			'foto' => 'img/thumb2.jpg'
		]
	];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Get</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<ul>
		<?php foreach($mahasiswa as $data) : ?>
			<li>
				<a href="GET2.php?nama=<?= $data['nama']; ?>
				&NPM=<?= $data['NPM']; ?>&Kelas=<?= $data['Kelas']; ?>&Prodi=<?= $data['Prodi']; ?>">
				<?= $data['nama']; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>
