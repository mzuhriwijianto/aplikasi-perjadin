<?php 
include 'koneksi.php';

$id_pegawai = $_GET['id_pegawai'];
$pass = $_GET['pass'];

		$cek=mysqli_query($conn, "select * from users A 
			inner join pegawai B 
				on A.id_pegawai = B.id_pegawai
			inner join unit_kerja C 
				on B.id_unit_kerja = C.id_unit_kerja
			where A.id_pegawai='$id_pegawai' and A.password='$pass'");
			
			
			while($row = mysqli_fetch_array($cek)) {  
                $users = $row;
            }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
 
	
	
	<div class="card">
		<div class="card-header">
		<h2>Konfirmasi Email Registrasi Aplikasi Perjadin </h2>
		</div>
		<div class="card-header">
			
			<p>
			Terimakasih <b><?php echo $users['nama_pegawai'] ?></b> telah melakukan registrasi pada aplikasi pengajuan perjalanan dinas, selanjutnya silahkan proses 
			konfirmasi pada link berikut ini <a href="http://localhost:8080/aplikasi-perjadin/proses-confirm-email.php?id_pegawai=<?php echo $id_pegawai?>&pass=<?php echo $pass?>"> KLIK DISINI </a> 
			</p>
		
		</div>
	
	</div>