<?php
require_once 'koneksi.php';
session_start();

// if(!$_SESSION['login']){
//     header('location: ../index.php');
//     exit;
// }
?>


<?php include"header.php";?>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">

<!-- akhir menu navigasi -->


      <!-- Layout 1 -->
      <div class="d-flex justify-content-between p-1 ms-5 me-5"> 
        <div class="pe-2 mb-3 worksans f-text" style="font-size: 2rem;">
          <div class="d-flex flex-row">
            <div class="mb-1">
              <svg class="bi pe-none me-2" width="40" height="40" fill="currentColor"><use xlink:href="#report"/></svg>
            </div>
            <div class="">
              <b>DATA LAPORAN DIAGNOSA</b>
            </div>
          </div>
        </div>
      </div>
      <!-- endLayout 1 -->
 <!-- table-->
<div class="d-flex justify-content-between p-1 ms-5 me-5"> 
  <table class="table table-hover text-center table-borderless">
    <thead class="s-color w-text">
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID</th>
        <th scope="col">Tanggal Diagnosa</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Tanggal Lahir Pasien</th>
        <th scope="col">Jenis Kelamin</th>
        <!-- <th scope="col">Kelas</th> -->
        <th scope="col">Diagnosa</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = mysqli_query($link, "SELECT * FROM laporan_diagnosa"); 
$i=1;
while ($datadiagnosa = mysqli_fetch_array($query)){
echo "
<tr>
  <td>$i</td>
  <td>L - 0$datadiagnosa[0]</td>
  <td>$datadiagnosa[1]</td>
  <td>$datadiagnosa[2]</td>
  <td>$datadiagnosa[3]</td>
  <td>$datadiagnosa[4]</td>
  
  <td>$datadiagnosa[6]</td>
  <td>
      <a href='proses_delete.php?id_laporan=$datadiagnosa[0]'>
        
        <button class='btn btn-outline-danger btn-sm worksans ' type='button'>
        <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#delete'/></svg>
        Hapus</button>
      <a/>
      <a href='../phppdf/index.php?id_laporan=$datadiagnosa[0]' target='_blank'>
        <button class='btn btn-primary btn-sm worksans shadow-lg shadowtext w-text' type='button'>
        <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#print'/></svg>
        View</button>
      <a/>
  </td>
  
</tr>
";
$i++;
}
?>
    </tbody>
  </table>
</div>
<!-- endTable-->

    </div>
</div>
<!-- Layout 1 -->

<?php include"footer.php"; ?>