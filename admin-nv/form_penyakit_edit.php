<?php
require_once 'koneksi.php';
session_start();

// if(!$_SESSION['login']){
//     header('location: ../index.php');
//     exit;
// }

$kode   = $_GET['kodepenyakit'];
$data   = mysqli_query($link,"SELECT * FROM penyakit WHERE kodepenyakit = '$kode'");
$datapenyakit    = mysqli_fetch_array($data);
?>

<?php include"header.php";?>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <ol class="breadcrumb">
            <li>
                <a href="index.php">Admin Panel</a>
            </li>
            <li class="active">Input Data Penyakit</li>
        </ol>
            <div class="modal-header">
                <h4 class="modal-title">EDIT DATA PENYAKIT</h4>
            </div>
            
            <form class="s-text" action="proses.php" method="POST">
			 <input type="hidden" name="no" id="" value="<?php echo $datapenyakit[0]; ?>">
                <div class="form-group">
                  <label for="kodepenyakit" class="col-sm-3 col-form-label">Kode Penyakit</label>
                  <div class="">
                    <input type="text" class="form-control" name="kodepenyakit" id="kodepenyakit" value="<?php echo $datapenyakit[1]; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="namapenyakit" class="col-sm-3 col-form-label">Nama Penyakit</label>
                  <div class="">
                    <input type="text" class="form-control" name="namapenyakit" id="namapenyakit" value="<?php echo $datapenyakit[2]; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="pengobatan" class="col-sm-3 col-form-label">Pengobatan</label>
                    <div class="">
                      <textarea name="pengobatan" id="pengobatan" cols="10" rows="3" class="form-control" ><?php echo $datapenyakit[3]; ?></textarea>
                    </div>
                </div>
                    <input type="submit" value="Edit Penyakit" name="editpenyakit" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>

        </div>        
      </div>

</div>
</div>
<!-- Layout 1 -->

<?php include"footer.php"; ?>
