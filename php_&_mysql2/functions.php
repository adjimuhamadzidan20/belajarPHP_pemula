<?php 
	//koneksi ke database / manggil database
	$host = 'localhost';
	$username = 'root';
	$pass = '';
	$database = 'phpdasar';

	$koneksi = mysqli_connect($host, $username, $pass, $database);

	// menampilkan data
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

	// menambah data
	function tambah($data) {
		global $koneksi;

		// menangkap input tiap elemen dalam form
		$nama = htmlspecialchars($data['nama']);
		$nrp = htmlspecialchars($data['nrp']);
		$email = htmlspecialchars($data['email']);
		$jurusan = htmlspecialchars($data['jurusan']);

		// upload gambar
		$gambar = upload();

		// jika file gagal diupload
		if ( !$gambar ) {
			return false;
		}

		// query memasukan data / insert data
		$insert = "INSERT INTO mahasiswa VALUES ('','$nama','$nrp','$email','$jurusan','$gambar')";

		mysqli_query($koneksi, $insert);

		return mysqli_affected_rows($koneksi);
	}

	// fungsi upload gambar
	function upload() {
		// mengambil data dari method $_FILES
		$namaFile 	= $_FILES['gambar']['name']; // nama file
		$ukuranFile = $_FILES['gambar']['size']; // ukuran file
		$errorFile 	= $_FILES['gambar']['error']; // error 0 = tidak ada error, error 4 = tidak ada file yg diupload
		$tempatFile = $_FILES['gambar']['tmp_name']; // lokasi file yang terupload (sementara)

		// cek jika gambar belum ter upload
		if ($errorFile === 4) {
			
			echo "
				<script>
					alert('Gambar belum diupload');
				</script>
			";

			// menyetop proses
			return false;
		}

		// cek jenis ext gambar yang diupload
		$extGambarValid = ['jpg', 'jpeg', 'png'];
		$extGambar = explode('.', $namaFile); // memecah sebuah string menjadi array
		$extGambar = strtolower(end($extGambar)); // mengkonversi ke lowercase & mengambil index terakhir dlm string

		if ( !in_array($extGambar, $extGambarValid) ) {
			echo "
				<script>
					alert('yang anda upload bukan file gambar');
				</script>
			";

			// menyetop proses
			return false;
		}

		// cek batas ukuran gambar ( 1 MB )
		if ( $ukuranFile > 1000000 ) {
			echo "
				<script>
					alert('ukuran gambar terlalu besar');
				</script>
			";

			// menyetop proses
			return false;
		}

		// generate nama file gambar baru
		$newNamaFile = uniqid(); // membangkitkan string random (angka)
		$newNamaFile .= '.'; // delimiter
		$newNamaFile .= $extGambar;

		// lulus pengecekan, gambar bisa diupload
		move_uploaded_file($tempatFile, 'gambar/' . $newNamaFile);

		// mengembalikan / menampilkan nama file gambar
		return $newNamaFile;
	}

	// menghapus data
	function hapus($id) {
		global $koneksi;

		$delete = "DELETE FROM mahasiswa where id = $id";

		mysqli_query($koneksi, $delete);

		return mysqli_affected_rows($koneksi);
	}

	// mengubah / mengupdate data
	function ubah($data) {
		global $koneksi;

		// menangkap input tiap elemen dalam form
		$id = $data['id'];
		$nama = htmlspecialchars($data['nama']);
		$nrp = htmlspecialchars($data['nrp']);
		$email = htmlspecialchars($data['email']);
		$jurusan = htmlspecialchars($data['jurusan']);

		$gambarlama = htmlspecialchars($data['gambarLama']);

		// apakah user milih gambar baru apa tidak
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarlama;
		}

		else {
			$gambar = upload();
		}

		// query mengupdate data
		$update = "UPDATE mahasiswa SET nama = '$nama', nrp = '$nrp', email = '$email', jurusan = '$jurusan', gambar = '$gambar'
		WHERE id = $id";

		mysqli_query($koneksi, $update);

		return mysqli_affected_rows($koneksi);
	}

	// mencari data
	function cari($keyword) {
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR 
		nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

		return query($query);

	}

	// register / sign up
	function registrasi($data) {
		global $koneksi;

		// mengambil data username & membersihkannya
		$username = strtolower(stripcslashes($data['username']));

		// cek username telah ada / belum
		$cek = "SELECT username FROM user WHERE username = '$username'";
		$hasil = mysqli_query($koneksi, $cek);

		if (mysqli_fetch_assoc($hasil)) {
			echo 
				"<script>
					alert('username sudah ada');
				</script>";

			return false;
		}

		$password = mysqli_real_escape_string($koneksi, $data['password']);
		$confirm = mysqli_real_escape_string($koneksi, $data['confirm-pass']);

		// cek konfirm password
		if ($password !== $confirm) {
			echo 
				"<script>
					alert('Konfirmasi password tidak valid');
				</script>";

			return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// menambahkan / memasukan username & password ke DB
		$query = "INSERT INTO user VALUES('', '$username', '$password')";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi); 


	}

?>