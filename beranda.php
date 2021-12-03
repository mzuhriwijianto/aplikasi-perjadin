<?php 
include 'header.php';

$query = mysqli_query($conn,'select count(*) as jumlah from pegawai');
    while($row = mysqli_fetch_array($query)) {
       $jumlah_pegawai_terdaftar = $row['jumlah'];    
    }

$query = mysqli_query($conn,'select count(*) as jml from pegawai');
    while($row = mysqli_fetch_array($query)) {
       $jumlah_pegawai_terdaftar = $row['jml'];    
    }
$query = mysqli_query($conn,'select count(*) as jml from pengajuan');
    while($row = mysqli_fetch_array($query)) {
       $jumlah_pengajuan = $row['jml'];    
    }
$query = mysqli_query($conn,'select count(*) as jml from pengajuan where status_disetujui = "Y"');
    while($row = mysqli_fetch_array($query)) {
       $jumlah_pengajuan_disetujui = $row['jml'];    
    }    
$query = mysqli_query($conn,'select count(*) as jml from pengajuan where status_disetujui = "N"');
    while($row = mysqli_fetch_array($query)) {
       $jumlah_pengajuan_tidak_disetujui = $row['jml'];    
    }       
?>

<div class="container">
 <div class="row" style="padding-top: 20px;"> 
     <div class="col-lg-8 bg-light" style="min-height: 200px;"> 
         <h2>Selamat Datang Di Aplikasi Pengajuan Perjalanan Dinas</h2> 
         <p>Pada Aplikasi ini anda dapat mengajukan perjalanan dinas pegawai</p>
         
    </div>
     <div class="col-lg-4 text-center">
         <a href="#" class="btn btn-primary btn-lg"> Unduh Usermanual Aplikasi  </a>
     </div>
     <div class="col-lg-8">
        <div class="row">
            <div class="col-md-3 text-center" style="min-height: 50px;"> 
                <h5>Total Pegawai Terdaftar : <br/><span class="badge bg-primary text-white"> <?php echo $jumlah_pegawai_terdaftar ?> </span> </h5>  
            </div>
            <div class="col-md-3 text-center" style="min-height: 50px;"> 
                <h5>Total Pengajuan Perjadin : <br/><span class="badge bg-info text-white"> <?php echo $jumlah_pengajuan ?> </span> </h5>   
            </div>
            <div class="col-md-3 text-center" style="min-height: 50px;"> 
                <h5>Total Perjadin Disetujui : <br/><span class="badge bg-success text-white"> <?php echo $jumlah_pengajuan_disetujui ?> </span> </h5>  
            </div>
             <div class="col-md-3 text-center" style="min-height: 50px;"> 
                <h5>Total Perjadin Belum Disetujui : <br/><span class="badge bg-danger text-white"> <?php echo $jumlah_pengajuan_tidak_disetujui ?> </span> </h5>   
            </div>
        </div>
     </div>       
 </div>
</div>


<?php 
include 'footer.php';
?>