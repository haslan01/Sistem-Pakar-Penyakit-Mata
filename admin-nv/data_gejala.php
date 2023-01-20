<?php
require_once 'koneksi.php';
session_start();

// if (!$_SESSION['login']) {
//   header('location: ../index.php');
//   exit;
// }
?>

<?php include"header.php";?>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <!-- Layout 1 -->
      <div class="d-flex justify-content-between p-1 ms-5 me-5">
        <div class="pe-2 mb-3 worksans f-text" style="font-size: 2rem;">
          <div class="d-flex flex-row">
            <div class="mb-1">
              <svg class="bi pe-none me-2" width="40" height="40" fill="currentColor">
                <use xlink:href="#icon-data" />
              </svg>
            </div>
            <div class="">
              <b>DATA GEJALA</b>
            </div>
          </div>
        </div>
        <div class="pe-2 mb-3 worksans f-text " style="font-size: 2rem;">
          <a href="form_gejala.php">
            <button class="btn btn-success rounded-pill btn-lg worksans gradient shadow-lg shadowtext w-text">
              <b>+ Tambah Data Gejala </b>
            </button>
          </a>
        </div>
      </div>
      <!-- endLayout 1 -->
      <!-- table-->
      <div class="d-flex justify-content-between p-1 ms-5 me-5">
        <table class="table table-hover text-center table-borderless">
          <thead class="s-color w-text">
            <tr>
              <th scope="col">Kode Gejala</th>
              <th scope="col">Nama</th>
              <th scope="col">Bobot Gejala</th>
              <th scope="col">Penyakit</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($link, "SELECT * FROM gejala");
            while ($datagejala = mysqli_fetch_array($query)) {
              echo "
<tr>
  <td>$datagejala[1]</td>
  <td>$datagejala[2]</td>
  <td>$datagejala[3]</td>
  <td>$datagejala[4]</td>
  <td>
      <a href='proses_delete.php?kodegejala=$datagejala[1]'> 
          <button class='btn btn-outline-danger btn-sm worksans ' type='button'>
          <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#delete'/></svg>
          Hapus</button>
      <a/>
      <a href='form_gejala_edit.php?kodegejala=$datagejala[1]'> 
          <button class='btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text' type='button'>
          <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#edit'/></svg>
          Edit</button>
      <a/>
  </td>
</tr>
";
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