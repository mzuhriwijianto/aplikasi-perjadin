<?php  include 'header.php';
    $id_unit_kerja = $_GET['id_unit_kerja'];
    if(isset($_POST['nama_unit_kerja'])) 
    {
       $id_unit_kerja = mysqli_real_escape_string($conn,$_POST['id_unit_kerja']);
      $edit_unit_kerja =  mysqli_query($conn,"UPDATE unit_kerja SET nama_unit_kerja='$nama_unit_kerja' WHERE id_unit_kerja = '$id_unit_kerja' ");
    }
	$query_unitkerja = mysqli_query($conn,"SELECT * FROM unit_kerja order by id_unit_kerja asc");
    $query_unitkerja = mysqli_query($conn,"SELECT * FROM unit_kerja WHERE id_unit_kerja = '$id_unit_kerja'");
    while($row = mysqli_fetch_array($query_unitkerja)) {
            $unit_kerja = $row;
     } 
?>
<div class="container">
    <div class="row">
        <?php if(isset($_POST['nama_unit_kerja']) and $edit_unit_kerja == TRUE ) 
         { echo '<div class="alert alert-success"> Edit Data Unit Kerja a.n '.$_POST['nama_unit_kerja'].' Berhasil </div>'; } ?>
        <div class="col-lg-12 text-center"> <h1> Form Edit Data Unit Kerja </h1> </div>
        <div class="col-lg-12">  
        <form action="edit-unit-kerja.php?id_unit_kerja=<?php echo $nama_unit_kerja?>" method="POST">
	        </br> 
             <div class="form-group row">
                <label class="col-lg-2"> Nama Unit Kerja </label>
                <div class="col-lg-4" style="padding-bottom: 10px;">
                        <input type="text" class="form-control" name="nama_unit_kerja" value="<?php echo $unit_kerja['nama_unit_kerja'] ?>">
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