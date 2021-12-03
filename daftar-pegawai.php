<?php include 'header.php';
$query_pegawai = mysqli_query($conn,'select A.*, B.nama_unit_kerja from pegawai A inner join unit_kerja B on A.id_unit_kerja = B.id_unit_kerja order by A.id_pegawai asc');
?>
<div class="container-fluid latar">
	<div class="row" style="padding-top: 20px;">
		<div class="col-lg-12 text-center"><a href="tambah-pegawai.php" class="btn btn-success">
			<i class="fas fa-file"></i> Tambah Data Pegawai </a>
			<a href="cetak-daftar-pegawai.php" target="_blank" class="btn btn-info">
			<i class="fas fa-file-excel"></i> Cetak Data Pegawai </a>
		</div>
		<div class="col-lg-12 text-center">
		<tbody>
		<table class="table table-striped" id="table-pegawai" class="shadow-lg p-3 mb-5 bg-white rounded">
		<thead><tr>
			<th scope="col">No</th><th scope="col">Nama Pegawai</th><th scope="col">NIP</th>
			<th scope="col">Unit Kerja</th>
			<th scope="col">Jabatan</th>
			<th scope="col">Edit</th><th scope="col">Hapus</th>
		</tr></thead>
			<?php $no = 1;
				while ($row = mysqli_fetch_array($query_pegawai)) {
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $row['nama_pegawai'] ?></td>
				<td><?php echo $row['NIP'] ?></td>
				<td><?php echo $row['nama_unit_kerja'] ?></td>
				<td><?php echo $row['jabatan'] ?></td>
				<td><a href="edit-pegawai.php?id_pegawai=<?php echo $row['id_pegawai'] ?>" class="btn btn-warning">
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
		$('#table-pegawai').DataTable();
	});
</script>