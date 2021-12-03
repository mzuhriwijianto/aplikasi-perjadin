<?php 
include 'koneksi.php';


$error = '';
$success = '';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
    
    $id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);
    $status = 'Y';
    
    $cek_user =  mysqli_query($conn,"select * from users where email = '{$email}'");
    $ada_email=mysqli_num_rows($cek_user);

    if($ada_email > 0){
        $error .=" <p>Email Sudah Pernah Terdaftar</p> <br/>";
    }

    if($password != $c_password){
        $error .=" <p>Konfirmasi Password Tidak Sama</p> <br/>";
    }
   
    if($id_pegawai == 0){
        $error .=" <p>Nama Belum Dipilih</p> <br/>";
    }

   


    if($error == '') {
        $passbaru = md5($password);
        
        $insert_pegawai =  mysqli_query($conn,"insert into users (email, password,id_pegawai,status)
        VALUES ('{$email}','{$passbaru}','{$id_pegawai}','{$status}') ");

        $success .=" <p>Registrasi Berhasil</p> <br/>";
    }



 }

 $query_pegawai =  mysqli_query($conn,"select * from pegawai order by nama_pegawai asc ");


	


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

    <form class="form-group" action="register.php" method="post">
<table width="500" border="1" align="center">
<thead>
	<tr><th colspan="2" class="text-center"><h6>REGISTRASI PENGGUNA</h6></th></tr>
    <tr><th colspan="2" class="text-center text-muted">Kembali Ke Halaman Login <a href="login.php">Login</a></th></tr>

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
		<td><b>Konfirmasi Password</b></td>
		<td><input class="form-control" type="password" name="c_password" size="30" placeholder="Masukan Password Kembali" maxlength="60"></td>
	</tr>
    <tr>
		<td><b>Nama : </b></td>
		<td><select class="form-control" name="id_pegawai">
                        <option value="0"> -- Pilih Nama Pegawai -- </option>
                       <?php  while($row = mysqli_fetch_array($query_pegawai)) {  ?>
                            <option value="<?php echo $row['id_pegawai'] ?>"> 
                                <?php echo $row['nama_pegawai'].' ('.$row['NIP'].')' ?> 
                            </option>
                       <?php } ?>
                </select></td>
	</tr>
	<tr>
		<td colspan="2" class="text-end"><button class="btn btn-primary" type="submit" name="submit">REGISTER</button></td>
	</tr>
    <?php if($error != '') {  ?>
	<tr><td colspan="2"> <div class="alert alert-danger text-center"> <b>  <?php echo $error;?> </b> </div> </td></tr>
    <?php } ?>
   
    <?php if($success != '') {  ?>
	<tr><td colspan="2"> <div class="alert alert-success text-center"> <b>  <?php echo $success;?> </b> </div> </td></tr>
    <?php } ?>
</tbody>
</table>
</form>

     </div>
</div>

</body>
</html>