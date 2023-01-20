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
      <ol class="breadcrumb">
            <li>
                <a href="index.php">Admin Panel</a>
            </li>
            <li class="active">INPUT DATA PENYAKIT</li>
        </ol>
      <div class="">
        <div class="modal-body">
            <div class="modal-header">
                <h4 class="modal-title">INPUT DATA PENYAKIT</h4>
            </div>
            
            <form class="s-text" action="proses.php" method="POST">
                <div class="form-group">
                  <label for="kodepenyakit" class="col-sm-3 col-form-label">Kode Penyakit</label>
                  <div class="">
                    <input type="text" class="form-control" width="50px" name="kodepenyakit" id="kodepenyakit" placeholder="Contoh : P0xx" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namapenyakit" class="col-sm-3 col-form-label">Nama Penyakit</label>
                  <div class="">
                    <input type="text" class="form-control" width="50px" name="namapenyakit" id="namapenyakit" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="pengobatan" class="col-sm-3 col-form-label">Pengobatan</label>
                    <div class="">
                      <textarea name="pengobatan" id="pengobatan" cols="50" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                    <input type="submit" value="Tambah Penyakit" name="inputpenyakit" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>

        </div>        
      </div>

      </div>
</div>
<!-- Layout 1 -->

<?php include"footer.php"; ?>

