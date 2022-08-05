<?php  
	// array
	$hari = array('senin','selasa','rabu','kamis','jumat','sabtu','minggu');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Array</title>
	<style>
		div {
			width: 80px;
			background-color: dodgerblue;
			color: white;
			padding: 10px;
			text-align: center;
			display: inline-block;
			text-transform: capitalize;
		}

	</style>
</head>
<body>
	<h1>Belajar Array</h1>

	<!-- for -->
	<?php for ($i= 0; $i < count($hari); $i++) { ?>
		<div><?php echo $hari[$i]; ?></div>
	<?php } ?>

	<br><br>
	
	<?php foreach ($hari as $day) :?>
		<div><?php echo $day;?></div>
	<?php endforeach;?>
	
</body>
</html>