<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=daftar-pegawai.xls");


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


$query_pegawai = mysqli_query($conn,'select A.*, B.nama_unit_kerja  
    from pegawai A inner join unit_kerja B on A.id_unit_kerja = B.id_unit_kerja
     order by A.id_pegawai asc');

?>

<table border="1" width="100%">
        <thead><tr>
            <th scope="col">#</th> <th scope="col">Nama Pegawai</th> <th scope="col">NIP</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Unit Kerja</th>

        </tr></thead>
        <tbody>
            <?php $no = 1;
                while($row = mysqli_fetch_array($query_pegawai)) { ?>                      
            <tr>
                <td> <?php echo $no ?> </td> <td> <?php echo $row['nama_pegawai'] ?> </td> 
                <td> <?php echo $row['NIP'] ?> &nbsp; </td> <td> <?php echo $row['jabatan'] ?> </td> 
                <td> <?php echo $row['nama_unit_kerja'] ?> </td> 
            </tr>
            <?php  $no++;  } ?>
        </tbody> </table>
