<?php 
	// import dari file functions.php 
	require 'functions.php';

	$id = $_GET['id'];

	if (hapus($id) > 0 ) {
		echo "
			<script>
				alert('data berhasil di delete');
				document.location.href = 'index.php';
			</script>
		";
	}

	else {
		echo "
			<script>
				alert('data gagal di delete');
				document.location.href = 'index.php';
			</script>
		";
	}


?>