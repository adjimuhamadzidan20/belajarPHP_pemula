<?php 
	if ( !isset($_GET['nama']) || !isset($_GET['NPM']) || !isset($_GET['Kelas']) || !isset($_GET['Prodi'])) {
		// redirect
		header('Location: GET.php');
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail</title>
</head>
<body>
	<ul>
		<li><img src="img/thumb2.jpg" alt="foto" style="width: 100px; height: 100px;"></li>
		<li><?= $_GET['nama']; ?></li>
		<li><?= $_GET['NPM']; ?></li>
		<li><?= $_GET['Kelas']; ?></li>
		<li><?= $_GET['Prodi']; ?></li>
	</ul>

	<a href="GET.php">kembali</a>
</body>
</html>