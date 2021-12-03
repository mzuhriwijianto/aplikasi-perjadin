<?php include 'header.php';
$query_unit_kerja = mysqli_query($conn,'SELECT * FROM unit_kerja order by id_unit_kerja asc');
?>
<div class="container-fluid">
	<div class="row" style="padding-top: 20px;">
		<div class="col-lg-12 text-center"><a href="edit-unit-kerja.php" class="btn btn-success">
			<i class="fas fa-file"></i> Tambah Unit Kerja </a>
			<a href="#" target="_blank" class="btn btn-info">
			<i class="fas fa-file-excel"></i> Cetak Data Unit Kerja </a>
		</div>
		<div class="col-lg-12 text-center">
		<tbody>
		<table class="table table-striped" id="table-unit-kerja">
		<thead><tr>
			<th scope="col">#</th>
			<th scope="col">Unit Kerja</th>
			<th scope="col">Edit</th><th scope="col">Hapus</th>
		</tr></thead>
			<?php $no = 1;
				while ($row = mysqli_fetch_array($query_unit_kerja)) {
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $row['nama_unit_kerja'] ?></td>
				<td><a href="edit-unit-kerja.php?id_pegawai=<?php echo $row['id_unit_kerja'] ?>" class="btn btn-warning">
					<i class="fas fa-edit"></i> Edit </a></td>
				<td><a href="hapus-pegawai.php?id_pegawai=<?php echo $row['id_pegawai'] ?>"
					onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Pegawai Ini ?')" class="btn btn-danger">
					<i class="fas fa-trash"></i> Hapus </a></td>
			</tr>
			<?php $no++; }?>
		</tbody></table>
		<div class="row"><div class="col-lg-12" style="margin-bottom: 80px; height: 50px;"><br/></div></div>
	</div>
</div>
<?php include 'footer.php' ;?>
<script>
	$(document).ready(function (){
		$('#table-unit-kerja').DataTable();
	});
</script>