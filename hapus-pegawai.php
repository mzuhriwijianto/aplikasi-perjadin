<?php include 'header.php';
	if(isset($_GET['id_pegawai'])) {
		$id_pegawai = $_GET['id_pegawai'];
		$hapus_pegawai = mysqli_query($conn,"DELETE from pegawai where id_pegawai = '{$id_pegawai}' ");
	}

	header('Location: daftar-pegawai.php');
?>