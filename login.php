<?php 
session_start();
include 'koneksi.php';


$error = '';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passbaru = md5($password);


	if(empty($email)){
		$error="<p>Silahkan Masukan Email Anda</p>";
	}elseif(empty($password)){
		$error="<p>Silahkan Masukan Password Anda</p>";
	}else{
		$cek=mysqli_query($conn, "select * from users A inner join pegawai B on A.id_pegawai = B.id_pegawai inner join unit_kerja C on B.id_unit_kerja = C.id_unit_kerja where A.email='$email' and A.password='$passbaru'");
		$ada=mysqli_num_rows($cek);
		if($ada == 0){
			$error="<p>Password dan email salah</p>";
		}else{

            while($row = mysqli_fetch_array($cek)) {  
                $users = $row;
            }

			$_SESSION['login']=TRUE;
			$_SESSION['data_user']=$users;
			echo "<script>alert('Selamat Datang');document.location='beranda.php'</script>";

		}
	}
}

?>

<html>
<head>
    <title>
        Aplikasi Pengajuan Perjalanan Dinas
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css" media="screen">
<style> 

td {
  padding:  10px;
}
</style>
</head>
<body>
<div class="row">
    <div class="col-lg-12" style="padding-bottom: 120px"> </div>
    <div class="col-lg-12">

    <form class="form-group" action="login.php" method="post">
<table width="500" border="1" align="center" class="shadow p-3 mb-5 bg-white rounded">
<thead>
	<tr><th colspan="2" class="text-center"><h5>LOGIN APLIKASI PENGAJUAN PERJALANAN DINAS</h5></th></tr>
	<tr><th colspan="2" class="text-center text-muted">Jika Anda Belum Mempunyai Akun, Silahkan Klik <a href="register.php">Registrasi</a></th></tr>
</thead>
<tbody>
	<tr>
		<td><b>Email</b></td>
		<td><input class="form-control" type="email" name="email" size="30" placeholder="Masukan Email" maxlength="60"></td>
	</tr>
	<tr>
		<td><b>Password</b></td>
		<td><input class="form-control" type="password" name="password" size="30" placeholder="Masukan Password" maxlength="60"></td>
	</tr>
	<tr>
		<td colspan="2" class="text-end"><button class="btn btn-primary" type="submit" name="submit">LOGIN</button></td>
	</tr>
    <?php if($error != '') {  ?>
	<tr><td colspan="2"> <div class="alert alert-danger text-center">  <?php echo $error;?> </div> </td></tr>
    <?php } ?>
</tbody>
</table>
</form>

     </div>
</div>

</body>
</html>

