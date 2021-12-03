<?php
session_start();

if(!isset($_SESSION['login'])) {
  header('location.login.php');
}
else {
  if($_SESSION['login']== false){
    header('location.login.php');
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_aplikasi_perjadin";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$x =  pathinfo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
$filename = $x['filename'];

?>
<html>
<head>
    <title>
        Aplikasi Pengajuan Perjalanan Dinas
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css" media="screen">
    <script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>

</head>
<body>
<div class="container-fluid fixed-top">
<nav class="navbar navbar-expand-lg navbar-success bg-secondary">
    <a class="navbar-brand" href="beranda.php">E-Perjadin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($filename=='beranda') { echo 'active bg-light'; } ?>" aria-current="page" href="beranda.php"><i class="fas fa-home"></i> Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($filename=='daftar-pegawai') { echo 'active bg-light'; } ?>" href="daftar-pegawai.php"><i class="fas fa-users"></i> Daftar Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($filename=='daftar-unit-kerja') { echo 'active bg-light'; } ?>" href="daftar-unit-kerja.php"><i class="far fa-file-alt"></i> Daftar Unit Kerja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($filename=='pengajuan') { echo 'active bg-light'; } ?>" href="pengajuan.php"><i class="far fa-file-alt"></i> Pengajuan Perjalanan Dinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($filename=='laporan') { echo 'active bg-light'; } ?>" href="laporan.php"><i class="far fa-clone"></i> Laporan</a>
        </li>
      </ul>
     <div class="d-flex">
        <input class="form-control me-12" type="search" placeholder="Cari Nama Pegawai" aria-label="Search">&nbsp;
        <button class="btn btn-light" type="submit">Cari</button> &nbsp;&nbsp;
      </div>
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <b> <?php echo $_SESSION['data_user']['nama_pegawai'].'('.$_SESSION['data_user']['nama_unit_kerja'].')' ?></b>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="register.php">
            <i class="fas fa-users"></i> Register</a></li>
            <li><a class="dropdown-item" href="logout.php">
            <i class="fas fa-reply"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>