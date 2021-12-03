<?php
include 'header.php';
$query_pengajuan = mysqli_query($conn,'SELECT A.*, B.nama_pegawai FROM pengajuan AS A INNER JOIN pegawai AS B ON A.id_pegawai = B.id_pegawai ORDER BY A.tgl_berangkat ASC');
?>

<div class="container latar">
    <div class="row" style="padding-top: 20px;">
        <div class="col-lg-12 text-center"> <a href="tambah-pengajuan.php" class="btn btn-dark">
            <i class=" fas fa-file"></i> Tabel Perjalanan Dinas </a> </div>
        <div class="col-lg-12 text-center">
        <table class="table table-striped" id="table-perjadin">
            <thead><tr>
                <th scope="col">No</th> <th scope="col">Nama Pegawai</th> 
                <th scope="col">Rincian Perjalanan Dinas</th>
                <th scope="col">Status</th>
                <th scope="col">Cetak</th> 
                
            </tr></thead>
            <tbody>
                <?php $no = 1;
                while($row = mysqli_fetch_array($query_pengajuan))  {
            ?>
            <tr>
                <td> <?php echo $no ?> </td>
                <td> <?php echo $row['nama_pegawai'] ?> </td>
                <td> <div class="card">
                        <div class="card-body">   
                            <ul>
                                <li>Untuk Perjalanan : <?php echo $row['judul_perjadin'] ?> </li>
                                <li>Kota Tujuan : <?php echo $row['kota_tujuan'] ?> </li> 
                                <li>Tanggal Perjalanan : <?php echo $row['tgl_berangkat'].' - '.$row['tgl_pulang'] ?> </li>
                            </ul>
                        </div>
                    </div>
                </td>
                <td> <?php 
                        if($row['status_disetujui']=='Y') { echo '<span class="badge bg-success">Disetujui</span>'; }
                                else { echo '<span class="badge bg-danger">Belum disetujui</span>';} ?>
                </td>    
                <td> <a href="surat-tugas.php?id_pengajuan=<?php echo $row['id_pengajuan'] ?>" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i>Cetak</a> </td>     
            <?php $no++;  } ?> 
            </tbody> 
        </table>

        <div class="row">
                    <div class="col-lg-10" style="margin-bottom: 100px; height: 20px;"> <br/> </div>
        </div>
     </div>
</div>
<?php include 'footer.php';?>
<script>
    $(document).ready( function () {
        $('#table-perjadin').DataTable();
    } );
</script>