<?php 
	//koneksi ke database / manggil database
	$koneksi = mysqli_connect('localhost', 'root', '', 'phpdasar');

	function query($query) {
		global $koneksi;
		
		//ambil data dari table mahasiswa / database php dasar
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row; 
		}

		return $rows;
	}
?>