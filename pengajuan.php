<?php
include 'header.php';
$query_pengajuan = mysqli_query($conn,'SELECT A.*, B.nama_pegawai FROM pengajuan AS A INNER JOIN pegawai AS B ON A.id_pegawai = B.id_pegawai ORDER BY A.tgl_berangkat ASC');
?>

<div class="container-fluid latar">
    <div class="row" style="padding: 20px;">
        <div class="col-lg-12 text-center"><a href="proses-pengajuan.php" class="btn btn-success">
            <i class="fas fa-file"></i> Ajukan Izin Perjalanan Dinas </a>
            <a href="cetak-pengajuan.php" target="_blank" class="btn btn-info">
            <i class="fas fa-print"></i> Cetak Laporan Izin Perjalanan Dinas </a> 
        </div>
        <div class="col-lg-12 text-center">
            <tbody>
            <table class="table table-striped" id="table-perjadin" class="shadow-lg p-3 mb-5 bg-white rounded">
                <thead>
                    <tr>
                        <th style="width: 3.00%" scope="col">#</th> 
                        <th scope="col">Nama Pegawai</th>  
                        <th scope="col">Rincian Perjalanan Dinas</th>
                        <th scope="col">Dokumen Pendukung</th> 
                        <th scope="col" style="width: 8.00%">Status</th> 
                        <th scope="col" style="width: 8.00%">Cetak Surat Tugas</th> 
                        <?php if($_SESSION['data_user']['id_unit_kerja']==1) { ?><th scope="col">Proses Persetujuan</th><?php } ?>
                    </tr>
                </thead>
                    <?php $no = 1;
                        while($row = mysqli_fetch_array($query_pengajuan)) {
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
                        <td> <?php if($row['file_foto_dok'] != null) { ?>
                            <a href="<? php echo $row['file_foto_dok'] ?>" target="_blank">
                            <img src="<?php echo $row['file_foto_dok'] ?>"width="100px" /></a>
                            <?php } ?>
                        <td> <?php 
                            if($row['status_disetujui']=='Y') { 
                                echo '<span class="badge bg-success">Disetujui</span>';
                            } else {
                                echo '<span class="badge bg-danger">Belum disetujui</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if($row['status_disetujui']=='Y') { ?>
                            <a target="_blank" href="surat-tugas.php?id_pengajuan=<?php echo $row['id_pengajuan']?>" class="btn btn-info">
                                <i class="fas fa-print"></i>Cetak</a>
                            <?php } else echo ' - '; ?>

                            <?php if($_SESSION['data_user']['id_unit_kerja']==1) { ?>
                            <td>
                                <?php if($row['status_disetujui']=='N') { ?>
                                <a target="_blank"
                                href="proses-persetujuan.php?id_pengajuan=<?php echo $row['id_pengajuan'] ?> &id=<?php echo $_SESSION['data_user']['id_pegawai'] ?>"
                                class="btn btn-success"><i class="fas fa-check"></i></a>
                                <?php } else echo ' - '; ?>
                            </td>
                        <?php } ?>
                        </td>
                    <?php $no++; } ?>
                </tbody>
            </table>
            <div class="row"><div class="col-lg-12" style="margin-bottom: 80px; height: 50px;"><br/></div></div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
    $(document).ready( function () {
        $('#table-perjadin').DataTable();
    } );
</script>