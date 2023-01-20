<?php
require_once 'koneksi.php';
session_start();

// if(!$_SESSION['login']){
//     header('location: ../index.php');
//     exit;
// }

$kode   = $_GET['kodegejala'];
$data   = mysqli_query($link,"SELECT * FROM gejala WHERE kodegejala = '$kode'");
$datagejala   = mysqli_fetch_array($data);
$query = mysqli_query($link, "SELECT * FROM penyakit"); 
?>
<?php include"header.php";?>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <ol class="breadcrumb">
            <li>
                <a href="index.php">Admin Panel</a>
            </li>
            <li class="active">Input Data Gejala</li>
        </ol>
            <div class="modal-header" style="font-size: 1.2rem;">
                <h4 class="modal-title">INPUT DATA GEJALA</h4>
            </div>
            
            <form class="s-text" action="proses.php" method="POST">
            <input type="hidden" name="no" id="" value="<?php echo $datagejala[0]; ?>">
                <div class="form-group">
                  <label for="kodegejala" class="col-sm-3 col-form-label">Kode Gejala</label>
                  <div class="">
                    <input type="text" class="form-control form-control-sm" name="kodegejala" id="kodegejala" value="<?php echo $datagejala[1]; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namagejala" class="col-sm-3 col-form-label">Nama Gejala</label>
                  <div class="">
                    <input type="text" class="form-control form-control-sm" name="namagejala" id="namagejala" value="<?php echo $datagejala[2]; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="nilai" class="col-sm-3 col-form-label">Nilai Gejala</label>
                    <div class="">
                      <input type="text" class="form-control form-control-sm" id="nilai" name="nilai" value="<?php echo $datagejala[3]; ?>" required>
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
                    <input type="submit" name="editgejala" id="" value="Ubah Gejala" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>

        </div>        
      </div>


  </div>
</div>
<!-- Layout 1 -->

<?php include"footer.php"; ?>