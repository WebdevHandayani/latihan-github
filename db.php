<?php
    $connection = new mysqli("localhost","root","","akses_db");
	
    if ($connection->connect_error){
		echo "Koneksi Database Gagal !";
		exit();
    }
?>