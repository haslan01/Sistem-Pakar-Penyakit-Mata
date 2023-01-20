<?php
require_once('../admin-nv/koneksi.php');
$id_laporan = $_GET['id_laporan'];
$data_laporan = mysqli_query($link, "SELECT * FROM laporan_diagnosa WHERE id_laporan = '$id_laporan'");
$showdata = mysqli_fetch_array($data_laporan);

$data_penyakit = mysqli_query($link, "SELECT * FROM penyakit WHERE namapenyakit = '$showdata[6]'");
$solusi = mysqli_fetch_array($data_penyakit);

$date    = date_create($showdata[1]);
$tanggal = date_format($date,"d F Y");
$nilai = round($showdata[7],2);

require('fpdf.php');

// memanggil library FPDF

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');


// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan

$pdf->SetLineWidth(0.5);


// Tampilkan logo pada sudut kiri atas pada 300 DPI

//Mengeset font
$pdf->SetFont('Times','',14);

//Geser 8 cm ke kanan

$pdf->SetTitle("L-$showdata[0] / Surat Keterangan / $showdata[2]",true);

$pdf->Ln(45);
$pdf->Cell(55);
$pdf->Cell(80,10,'Surat Keterangan',1,1,'C');

$pdf->SetFont('','',11);
$pdf->Ln(10);
$pdf->Cell(16);
$pdf->Cell(45,5,"Saya yang bertanda tangan dibawah ini : ",0,0);
$pdf->Cell(16);
$pdf->SetFont('','I','');
$pdf->Cell(120,5,'',0,1);
$pdf->Ln(2);
$pdf->Cell(16);
$pdf->SetFont('','','');
$pdf->Cell(45,5,"Nama",0,0);
$pdf->Cell(120,5,": (NamaGuru) ",0,1);
$pdf->Cell(16);
$pdf->Cell(45,5,'Jabatan',0,0);
$pdf->SetFont('','','');
$pdf->Cell(120,5,": (Jabatan)",0,1);

$pdf->Ln(4);
$pdf->Cell(16);
$pdf->Cell(45,5,"Menerangkan bahwa siswa :",0,0);
$pdf->Ln(6);
$pdf->Cell(16);
$pdf->Cell(45,5,"Nama",0,0);
$pdf->Cell(120,5,": $showdata[2]" ,0,1);
$pdf->Cell(16);
$pdf->Cell(45,5,"Tanggal Lahir",0,0);
$pdf->Cell(120,5,": $showdata[3]" ,0,1);
$pdf->Cell(16);
$pdf->Cell(45,5,"Jenis Kel",0,0);
$pdf->Cell(120,5,": $showdata[4]" ,0,1);
$pdf->Cell(16);
$pdf->Cell(45,5,"Kelas",0,0);
$pdf->Cell(120,5,": $showdata[5]" ,0,1);

$pdf->Ln(4);
$pdf->Cell(16);
$pdf->MultiCell(170, 5, "Melalui perhitungan Teorema Bayes terhadap gejala yang dialami. Siswa tersebut Didiagnosa terkena $showdata[6] Sebesar $nilai%. Diharapkan orangtua / Wali siswa untuk $solusi[3]. ", 0);
$pdf->Ln(4);
$pdf->Cell(16);
$pdf->MultiCell(170, 5, "Demikian surat keterangan ini kami buat dengan sebenar - benarnya untuk dapat digunakan sebaik - baiknya, terima kasih.", 0);
$pdf->Cell(120,5," " ,0,1);




//---------------------Blok TTD------------------------
$pdf->Ln(20);
$pdf->SetFont('','','');
$pdf->Cell(126);
$pdf->MultiCell(50,5,"Medan, $tanggal Hormat Kami",0,1);
$pdf->Ln(20);
$pdf->Cell(126);
$pdf->MultiCell(50,5,"Nama Guru",0,1);














$pdf->Output();


?>