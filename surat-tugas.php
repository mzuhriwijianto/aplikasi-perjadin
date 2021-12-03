<?php  
include 'library/TCPDF-main/tcpdf.php';

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
$id_pengajuan = $_GET['id_pengajuan'];
$query_pengajuan = mysqli_query($conn,"select *  
    from pengajuan A inner join pegawai B on A.id_pegawai = B.id_pegawai 
    inner join unit_kerja C on B.id_unit_kerja = C.id_unit_kerja
    where A.id_pengajuan = '{$id_pengajuan}'");

    while($row = mysqli_fetch_array($query_pengajuan)) { 
        $pengajuan = $row;
    }

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'F4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Aplikasi Pengajuan Perjalanan Dinas');
$pdf->SetAuthor('Admin Aplikasi');
$pdf->SetTitle('Surat Tugas');

// set margins
$pdf->SetMargins(10, 15, 10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);



// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();


// create some HTML content
$html = '<div style="text-align:center">
            <h2>Surat Tugas</h2>
            <table width="100%"> 
            <tr>
               <td width="10%"> </td>
                <td > Nomor : 900/  11212  /412.303/2021 </td>
            </tr>
            </table>    
        </div>';

$html .= '<p> 
    Yang bertanda tangan di bawah ini, Kepala '.$pengajuan['nama_unit_kerja'].' memberikan tugas kepada :
    </p>';

$html .= '<table> 
            <tr><td> Nama </td><td width="5%"> : </td> <td>'.$pengajuan['nama_pegawai'].' </td> </tr> 
            <tr><td> NIP </td><td width="5%"> : </td> <td>'.$pengajuan['NIP'].' </td> </tr> 
            <tr><td> Jabatan </td><td width="5%"> : </td> <td>'.$pengajuan['jabatan'].'</td> </tr> 
            <tr><td> Unit Kerja </td><td width="5%"> : </td> <td>'.$pengajuan['nama_unit_kerja'].' </td> </tr> 
        </table>';

 
$html .= '<p> 
untuk mengikuti kegiatan '.$pengajuan['judul_perjadin'].' yang akan dilaksanakan di '.$pengajuan['kota_tujuan'].' mulai tanggal '.$pengajuan['tgl_berangkat'].'  s/d '.$pengajuan['tgl_pulang'].'.
    </p>';

    $html .= '<p> 
    Demikian surat tugas ini diberikan untuk dapat dilaksanakan dengan penuh tanggung jawab dan setelah selesai mengikuti kegiatan di mohon untuk menyampaikan laporan secara tertulis.
    </p>';


    $html .= '
            <table width="100%" style="text-align:center"> 
            <tr>
               <td width="50%"> </td>
                <td> Bojonegoro, '.date('d-F-Y').' </td>
            </tr>
            <tr>
            <td width="50%"> </td>
             <td> <br/><br/><br/><br/> </td>
         </tr>
         <tr>
         <td width="50%"> </td>
          <td><b><u> '.$pengajuan['nama_pegawai'].' </b></u></td>
      </tr>
            </table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('surat-tugas.pdf', 'I');

?>
