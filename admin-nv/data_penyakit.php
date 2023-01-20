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
      <div>
        <div class="pe-2 mb-3 worksans f-text" style="font-size: 2rem;">
            <div class="d-flex flex-row">
                <div class="mb-1">
                    <svg class="bi pe-none me-2" width="40" height="40" fill="currentColor"><use xlink:href="#icon-data"/></svg>
                </div>
                <div class="">
                    <b>DATA PENYAKIT</b>
                </div>
            </div>
        </div>
        <div class="pe-2 mb-3 worksans f-text " style="font-size: 2rem;">
            <a href="form_penyakit.php">
                <button
                    class="btn btn-success rounded-pill btn-lg worksans gradient shadow-lg shadowtext w-text">
                    <b>+ Tambah Data Penyakit
                    </b>
                </button>
            </a>
        </div>
    </div>
    <!-- endLayout 1 -->
    <!-- table-->
    <div class="">
        <table class="table">
            <thead class="s-color w-text">
                <tr>
                    <th scope="col">Kode Penyakit</th>
                    <th scope="col">Nama</th>
                    <th scope="col" style="width:50%">Pengobatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $query = mysqli_query($link, "SELECT * FROM penyakit"); 
    $i = 1;
    while ($datapenyakit = mysqli_fetch_array($query)){
    echo "
    <tr>
        <td>$datapenyakit[1]</td>
        <td>$datapenyakit[2]</td>
        <td>$datapenyakit[3]</td>
        <td>
            <a href='proses_delete.php?kodepenyakit=$datapenyakit[1]'>
                <button class='btn btn-outline-danger btn-sm worksans ' type='button'>
                <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#delete'/></svg>
                Hapus</button>
            <a/>
            <a href='form_penyakit_edit.php?kodepenyakit=$datapenyakit[1]'> 
                <button class='btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text' type='button'>
                <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#edit'/></svg>
                Edit</button>
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