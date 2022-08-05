<?php  
	session_start();

	$_SESSION = []; // meyakinkan session itu hilang 
	session_unset();
	session_destroy();

	// menghapus cookie
	setcookie('id', '', time() - 3600);
	setcookie('key', '', time() - 3600);
	
	header('Location: login.php');
	exit;
		
?>