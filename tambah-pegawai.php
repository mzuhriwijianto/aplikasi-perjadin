<?php  include 'header.php';
    if(isset($_POST['nama_pegawai'])) 
    {
       $nama_pegawai = mysqli_real_escape_string($conn,$_POST['nama_pegawai']);
       $NIP = mysqli_real_escape_string($conn,$_POST['NIP']);
       $jabatan = mysqli_real_escape_string($conn,$_POST['jabatan']);
       $id_unit_kerja = mysqli_real_escape_string($conn,$_POST['id_unit_kerja']);
      $insert_pegawai =  mysqli_query($conn,"insert into pegawai (nama_pegawai,NIP,jabatan,id_unit_kerja)
                                    		 VALUES ('{$nama_pegawai}','{$NIP}','{$jabatan}','{$id_unit_kerja}') ");
    }  

	$query_unitkerja = mysqli_query($conn,"select * from unit_kerja order by id_unit_kerja asc"); 
?>
<div class="container">
</br>
    <div class="row">
        <?php if(isset($_POST['nama_pegawai']) and $insert_pegawai == TRUE ) 
         { echo '<div class="alert alert-success"> Tambah Data Pegawai a.n '.$_POST['nama_pegawai'].' Berhasil </div>'; } ?>
        <div class="col-lg-12 text-center"> <h2> Form Tambah Data Pegawai </h2> </div>
        <div class="col-lg-12">  
        <form action="tambah-pegawai.php" method="POST">
	        </br> 
             <div class="form-group row">
                <label class="col-lg-2"> Nama Pegawai </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" class="form-control" name="nama_pegawai">
                </div>
                <div class="col-lg-6"></div>
                <label class="col-lg-2"> NIP </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="number" maxlength="20" size="16" class="form-control" name="NIP">
                </div>
                <div class="col-lg-6"> </div>
                <label class="col-lg-2"> Jabatan </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" maxlength="50" size="16" class="form-control" name="jabatan">
                </div>
                <div class="col-lg-6"> </div>
                <label class="col-lg-2"> Unit Kerja </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <select class="form-control" name="id_unit_kerja">
                        	<option>-- Pilih Unit Kerja --</option>
                        	<?php while($row = mysqli_fetch_array($query_unitkerja)) { ?>
                        		<option value="<?php echo $row['id_unit_kerja'] ?>">
                        			<?php echo $row['nama_unit_kerja'] ?>
                        		</option>
                        	}
                        <?php } ?>
                    	</select>
                  </div>
                <div class="col-lg-12 text-center"> 
                    <input type="reset" value="BATAL" class="btn btn-danger">
                    <input type="submit" value="SIMPAN" class="btn btn-primary"> 
                </div>

            </div>
        </form>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>