<?php include 'header.php';
	$success = 0;
	if(isset($_GET['id_pengajuan'])) {

		$id_pengajuan = $_GET['id_pengajuan'];
		$id_pegawai = $_GET['id'];

		if($id_pegawai == $_SESSION['data_user']['id_pegawai'] and $_SESSION['data_user']['id_unit_kerja'] == 1) {
			$proses = mysqli_query($conn,"UPDATE pengajuan SET status_disetujui = 'Y' WHERE id_pengajuan = '$id_pengajuan' ");
			$success = 1;
		}
	}

	if($success == 1) {
		echo "<script>alert('Berhasil Disetujui');document.location='pengajuan.php'</script>";
	}
	else {
		echo "<script>alert('Gagal Disetujui');document.location='pengajuan.php'</script>";
	}