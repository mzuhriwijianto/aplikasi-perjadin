<?php 
include 'koneksi.php';

$id_pegawai = $_GET['id_pegawai'];
$pass = $_GET['pass'];

		$cek=mysqli_query($conn, "update users set status = 'Y' where id_pegawai='$id_pegawai' and password='$pass'");
			
					

?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css" media="screen">
    <script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
 
  
	
	<div class="card">
		<div class="card-header">
		<h2>Konfirmasi Email Registrasi Aplikasi Perjadin </h2>
		</div>
		<div class="card-header">
			
			<p>
            Konfirmasi Email Berhasil,
			silahkan klik link berikut ini untuk login kedalam aplikasi : <a href="http://localhost:8080/aplikasi-perjadin/login.php"> KLIK DISINI </a> 
			</p>
		
		</div>
	
	</div>