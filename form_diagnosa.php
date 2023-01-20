<?php
require_once 'admin-nv/koneksi.php';
session_start();
error_reporting(E_ERROR | E_PARSE);

// if(!$_SESSION['login']){
//     header('location: ../index.php');
//     exit;
// }
?>

<?php include "include/header.php"; ?>

<!-- akhir menu navigasi -->

<div class="container">
    <!-- membuat jumbotron -->
    <div class="jumbotron">
        <div class="mb-2" style="font-size: 1.2rem;">
            <h4>BIODATA PASIEN</h4>
        </div>

        <form class="s-text" action="" method="POST">
            <div class="row mb-3">
                <label for="tanggal_diagnosa" class="col-sm-3 col-form-label">Tanggal Diagnosa</label>
                <div class="col-sm-4 pt-1">
                    <input
                        type="date"
                        class="form-control form-control-sm"
                        id="tanggal_diagnosa"
                        name="tgl_diagnosa"
                        value="<?php echo date("Y-m-d");?>"
                        readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-8 pt-1">
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama">
                </div>
            </div>
            <div class="row mb-3">
                <label for="date" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-4 pt-1">
                    <input type="date" class="form-control form-control-sm" id="date" name="lahir">
                </div>
            </div>
            <fieldset class="row mb-3">
                <label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="" type="radio" name="gender" id="l" value="Laki - Laki">
                        <label class="form-check-label" for="l">
                            Laki - Laki
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="" type="radio" name="gender" id="p" value="Perempuan">
                        <label class="form-check-label" for="p">
                            Perempuan
                        </label>
                    </div>
                </div>
            </fieldset>
            <!-- <div class="row mb-3">
                <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-2 pt-1">
                    <input type="text" class="form-control form-control-sm" id="kelas" name="kelas">
                </div>
            </div> -->
            <div class="mt-1 f-text" style="font-size: 1.2rem;">
                <h3>GEJALA YANG DIALAMI</h3>
            </div>
            <?php
    $gejala = mysqli_query($link,'SELECT * FROM gejala');
    while ($row = mysqli_fetch_array($gejala)){  
        echo "
			 <div class='row mb-3'>
                    <label for='' class='col-sm-8 col-form-label'>$row[0].   $row[2]</label>
                    <div class='form-check form-switch col-sm-3 ms-3 pt-2'>
                        <input class='' type='checkbox' role='switch' id='$row[1]' name='$row[1]' value='$row[3]'>
                        <label class='form-check-label' for='$row[1]'>Iya</label>
                    </div>
                </div>
        ";
        
    }
?>

            <input
                type="submit"
                value="Diagnosa"
                name="diagnosa"
                class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
        </form>
        <br>
        <!-- hasilDiagnosa -->
        <div class="layout_padding">
            <div class="" style="width: 50%;">
                <div class="mb-2" style="font-size: 1.2rem;">
                    <h2>HASIL DIAGNOSA</h2>
                </div>
                <?php
                include 'proses_diagnosa.php';
                ?>
                <!-- <a href="admin-nv/data_laporan.php">
                    <button
                        class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">Lihat Laporan</button>
                </a> -->
                <a href="">
                    <button class='btn btn-outline-success btn-sm worksans ' type='button'>Kembali</button>
                </a>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>