<?php 
	// date
	echo date('l, d-M-Y');

	// time
	// UNIX Timestamp / EPOCH TIME
	// detik yang telah berlalu sejak 1 januari 1970
	// echo time();
	// echo date('d M Y', time()-60*60*24*4000);

	// mktime
	// membuat detik sendiri
	// mktime(0,0,0,0,0,0);
	// jam, menit, detik, bulan, tgl, tahun
	echo date('l, d M Y', mktime(0,0,0,12,9,2000));

	// strtotime()
	echo strtotime('09 Dec 2000');
	
?>