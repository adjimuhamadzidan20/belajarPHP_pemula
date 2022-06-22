<?php  
	$jadwal_kuliah = [
		['Senin', 'Penulisan Ilmiah', 'Teknik Kompilasi', 'Pemrograman visual'],
		['Selasa', 'Akhlak & Etika', 'Interaksi Manusia & Komputer'],
		['Rabu', 'Analisa Perancangan Sistem Informasi', 'Pemrograman Web Lanjut'],
		['Kamis', 'Libur'],
		['Jumat', 'Aplikasi Kewirausahaan']
	];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>latihan1</title>

	<style>
		h1, p {
			text-align: center;
		}

		.contain {
			width: 100%;
			display: flex;
			justify-content: center;
			margin: auto;
			background-color: white;
		}

		div {
			background-color: dodgerblue;
			width: 180px;
			height: 180px;
			margin-right: 10px;
			text-align: center;
			color: white;
			font-weight: bold;
			font-family: Cambria, Georgia, Times, "Times New Roman", serif;
			padding: 10px;
			box-sizing: border-box;
			border-radius: 8px;
		}
	</style>
</head>
<body>
	<h1>Jadwal Kuliah</h1>
	<p>Semester 6</p>
	
	<div class="contain">
		<?php foreach ($jadwal_kuliah as $matkul) : ?>
			<div>
				<?php foreach ($matkul as $a) : ?>
					<p><?= $a; ?></p>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
	
</body>
</html>

