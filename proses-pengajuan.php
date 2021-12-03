<?php
include 'header.php';
if(isset($_POST['id_pegawai'])) {
    $id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);
    $tgl_pengajuan = date('Y-m-d H-i-s');
    $tgl_berangkat = mysqli_real_escape_string($conn, $_POST['tgl_berangkat']);
    $tgl_pulang = mysqli_real_escape_string($conn, $_POST['tgl_pulang']);
    $judul_perjadin = mysqli_real_escape_string($conn, $_POST['judul_perjadin']);
    $kota_tujuan = mysqli_real_escape_string($conn, $_POST['kota_tujuan']);
    $status_disetujui = 'N';
    $folderUpload = "./dokumen";
    $fileDok = $_FILES['file_foto_dok'];
    $uploadDok = move_uploaded_file($fileDok['tmp_name'], "$folderUpload/".$fileDok['name']);
    $insert_pengajuan = mysqli_query($conn, "INSERT INTO pengajuan (id_pegawai, tgl_pengajuan, tgl_berangkat, tgl_pulang, judul_perjadin, kota_tujuan, status_disetujui, file_foto_dok)
    VALUES ('$id_pegawai', '$tgl_pengajuan', '$tgl_berangkat', '$tgl_pulang', '$judul_perjadin', '$kota_tujuan', '$status_disetujui', '$folderUpload/".$fileDok['name']."')");
}
    $query_pegawai = mysqli_query($conn, "SELECT * from pegawai ORDER BY id_pegawai ASC");
    
?>
<div class="container-fluid latar">
    <div class="row">
    <?php if(isset($_POST['id_pegawai']) and $insert_pengajuan == TRUE ) { 
        echo '<div class="alert alert-success"> Tambah Pengajuan Perjalanan Dinas Pegawai Berhasil </div>'; } 
    ?>
        <div class="col-lg-12 text-center py-3"> 
            <h4> Form Tambah Perjalanan Dinas </h4> 
        </div>
        <div class="col-lg-12">  
            <form action="proses-pengajuan.php" method="POST" enctype="multipart/form-data" style="min-height: 100px;">
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Nama Pegawai </label>
                    <div class="col-lg-4" style="padding-bottom: 10px;">
                    <select class="form-control" name="id_pegawai">
                        <option> -- Pilih Nama Pegawai -- </option>
                        <?php 
                        while($row = mysqli_fetch_array($query_pegawai)) { ?>
                            <option value="<?php echo $row['id_pegawai']?>">
                                <?php echo $row['nama_pegawai'].' | '.$row['NIP'].' | '.$row['jabatan'].'' ?>
                            </option>
                        <?php } ?>
                    </select>
                    </div>
                    <!-- //input file -->
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Tanggal Berangkat </label>
                    <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="date" size="16" class="form-control" name="tgl_berangkat">
                    </div>
                    <div class="col-lg-3"></div>

                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Tanggal Pulang </label>
                    <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="date" size="16" class="form-control" name="tgl_pulang">
                    </div>
                    <div class="col-lg-3"></div>

                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Untuk Perjalanan Dinas </label>
                    <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" size="16" class="form-control" name="judul_perjadin">
                    </div>

                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Kota Tujuan </label>
                    <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" size="16" class="form-control" name="kota_tujuan">
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <label class="col-lg-2"> Upload Dokumen Pendukung </label>
                    <div class="col-lg-4" style="padding-bottom: 10px">
                        <input type="file" class="form-control" name="file_foto_dok" accept=".gif,.jpg,.jpeg,.png">
                    </div>
                    <div class="col-lg-3"></div>

                    <div class="col-lg-3"></div>
                    <div class="col-lg-12 text-center"> 
                        <input type="reset" value="BATAL" class="btn btn-danger">
                        <input type="submit" value="SIMPAN" class="btn btn-success"> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>