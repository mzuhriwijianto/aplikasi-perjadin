<?php  include 'header.php';
    $id_pegawai = $_GET['id_pegawai'];
    if(isset($_POST['nama_pegawai'])) 
    {
       $nama_pegawai = mysqli_real_escape_string($conn,$_POST['nama_pegawai']);
       $NIP = mysqli_real_escape_string($conn,$_POST['NIP']);
       $jabatan = mysqli_real_escape_string($conn,$_POST['jabatan']);
       $id_unit_kerja = mysqli_real_escape_string($conn,$_POST['id_unit_kerja']);
      $edit_pegawai =  mysqli_query($conn,"UPDATE pegawai SET nama_pegawai='$nama_pegawai', NIP='$NIP', jabatan = '$jabatan',
        id_unit_kerja ='$id_unit_kerja' WHERE id_pegawai = '$id_pegawai' ");
    }
	$query_unitkerja = mysqli_query($conn,"SELECT * FROM unit_kerja order by id_unit_kerja asc");
    $query_pegawai = mysqli_query($conn,"SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
    while($row = mysqli_fetch_array($query_pegawai)) {
            $pegawai = $row;
     } 
?>
<div class="container">
    <div class="row">
        <?php if(isset($_POST['nama_pegawai']) and $edit_pegawai == TRUE ) 
         { echo '<div class="alert alert-success"> Edit Data Pegawai a.n '.$_POST['nama_pegawai'].' Berhasil </div>'; } ?>
        <div class="col-lg-12 text-center"> <h2> Form Edit Data Pegawai </h2> </div>
        <div class="col-lg-12">  
        <form action="edit-pegawai.php?id_pegawai=<?php echo $id_pegawai?>" method="POST">
	        </br> 
             <div class="form-group row">
                <label class="col-lg-2"> Nama Pegawai </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $pegawai['nama_pegawai'] ?>">
                </div>
                <div class="col-lg-6"></div>
                <label class="col-lg-2"> NIP </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="number" maxlength="20" size="16" class="form-control" name="NIP" value="<?php echo $pegawai['NIP'] ?>">
                </div>
                <div class="col-lg-6"> </div>
                <label class="col-lg-2"> Jabatan </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" maxlength="50" size="16" class="form-control" name="jabatan" value="<?php echo $pegawai['jabatan'] ?>">
                </div>
                <div class="col-lg-6"> </div>
                <label class="col-lg-2"> Unit Kerja </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <select class="form-control" name="id_unit_kerja">
                        	<option>-- Pilih Unit Kerja --</option>
                        	<?php while($row = mysqli_fetch_array($query_unitkerja)) {
                                if($pegawai['id_unit_kerja'] == $row['id_unit_kerja']) {$selected = 'selected';}
                                else {$selected = '';}
                            ?>
                        		<option <?php echo $selected ?> value="<?php echo $row['id_unit_kerja'] ?>">
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