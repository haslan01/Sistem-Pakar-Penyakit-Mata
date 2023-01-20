<?php
require_once 'koneksi.php';
session_start();

// if(!$_SESSION['login']){
//     header('location: ../index.php');
//     exit;
// }
$query = mysqli_query($link, "SELECT * FROM penyakit"); 
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
            <div class="modal-header">
                <h4 class="modal-title">INPUT DATA GEJALA</h4>
            </div>
            
            <form class="s-text" action="proses.php" method="POST">
                <div class="form-group">
                  <label for="kodegejala" class="col-sm-3 col-form-label">Kode Gejala</label>
                  <div class="">
                    <input type="text" class="form-control" name="kodegejala" id="kodegejala" placeholder="Contoh : G0xx" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namagejala" class="col-sm-3 col-form-label">Nama Gejala</label>
                  <div class="">
                    <input type="text" class="form-control" name="namagejala" id="namagejala" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="nilai" class="col-sm-3 col-form-label">Nilai Gejala</label>
                    <div class="">
                      <input type="text" class="form-control" id="nilai" name="nilai" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="penyakit" class="col-sm-3 col-form-label">Penyakit</label>
                    <div class="">
                        <select class="form-control" aria-label="Default select example" name="kodepenyakit">
							<option selected>--Penyakit--</option>
                            <?php while ($datapenyakit = mysqli_fetch_array($query)){						
							echo "
							<option value=$datapenyakit[1]>$datapenyakit[1]</option>";
							} ?>
                          </select>
                    </div>
                </div>
                    <input type="submit" name="inputgejala" value="Tambah Gejala" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>

        </div>        
      </div>




 </div>
</div>
<!-- Layout 1 -->

<?php include"footer.php"; ?>