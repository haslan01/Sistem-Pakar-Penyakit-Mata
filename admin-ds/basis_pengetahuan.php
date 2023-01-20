<?php include"header.php"; ?>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Admin Panel</a>
            </li>
            <li class="active">Rule Dempster Shafer</li>
        </ol>
        <h1>Data Rule | Basis Pengetahuan</h1>
        <!-- Trigger the modal with a button -->
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Data Penyakit & Solusi</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="simpanpenyakit.php">
                            <div class="form-group">
                                <label for="kdpenyakit">KD Penyakit :</label>
                                <input type="text" class="form-control" id="kdpenyakit" name="kdpenyakit">
                            </div>
                            <div class="form-group">
                                <label for="nama_penyakit">Nama Penyakit :</label>
                                <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit">
                            </div>
                            <div class="form-group">
                                <label for="definisi">Definisi Penyakit :</label>
                                <textarea class="form-control" rows="3" id="definisi" name="definisi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="solusi">Solusi Penyakit :</label>
                                <textarea class="form-control" rows="3" id="solusi" name="solusi"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="konten">
                        <form
                            id="form1"
                            name="form1"
                            method="post"
                            action="simpan_kaidah_produksi.php"
                            enctype="multipart/form-data">
                            <div>
                                <table
                                    class="tab"
                                    width="650"
                                    border="0"
                                    align="center"
                                    cellpadding="4"
                                    cellspacing="1"
                                    bordercolor="#F0F0F0"
                                    bgcolor="#CCCC99">
                                    <tr bgcolor="#FFFFFF">
                                        <td>Kode Rule</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">
                                        <td colspan="2">
                                            <strong>IF</strong>
                                            <ul style="list-style:none;">
                                                <?php
	include "koneksi.php";
	$arrPenyakit=array(); $arrGejala=array();
	$query=mysqli_query($koneksi,"SELECT * FROM tb_gejala ORDER BY id ASC") or die("Query Error..!" .mysqli_error);
	while ($row=mysqli_fetch_array($query)){
		$arrGejala["$row[id]"]=$row['kdgejala'].",".$row['gejala'];
	?>
                                                <li><input
                                                    type="checkbox"
                                                    name="gejala[]"
                                                    id="gejala"
                                                    value="<?php echo $row['id'];?>">
                                                    <?php echo $row['kdgejala'] ."<strong>|&nbsp;</strong>".$row['gejala'];?>
                                                    <strong>&nbsp;&nbsp;AND</strong>
                                                </li>
                                                <?php } ?></ul>
                                            <strong>&nbsp;&nbsp;THEN
                                                <select name="TxtKdPenyakit" id="TxtKdPenyakit">
                                                    <option value="NULL">[ Daftar Penyakit ]</option>
                                                <?php 
	$sqlp = "SELECT * FROM tb_penyakit ORDER BY id";
	$qryp = mysqli_query($koneksi,$sqlp) 
		    or die ("SQL Error: ".mysqli_error($koneksi));
	while ($datap=mysqli_fetch_array($qryp)) {
		if ($datap['id']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		$arrPenyakit["$datap[id]"]=$datap['nama_penyakit'];
		echo "<option value='$datap[id]' $cek>$datap[id]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
	}
  ?>
                                                </select>
                                                CF<input type="text" name="cf" size="5"></strong>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#FFFFFF">
                                        <td>&nbsp;</td>
                                        <td><input type="reset" name="Submit2" value="Reset"/><input type="submit" name="Submit" value="Set Rule"/></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th >
                                        <strong>#</strong>
                                    </th>
                                    <th>
                                        <strong>KD Gejala | Nama Gejala</strong>
                                        <span style="float:right; margin-right:25px;">
                                            <strong></strong></span></th>
                                    <?php $query_p=mysqli_query($koneksi,"SELECT id_problem FROM tb_rules GROUP BY id_problem");
	while($data_p=mysqli_fetch_array($query_p)){
	?>
                                    <th><?php $idp=$data_p['id_problem']; echo "$idp | "; print_r($arrPenyakit["$idp"]); ?><br>
                                        <a href="edit_rule_base.php?kdpenyakit=<?php echo $data_p['id_problem'];?>">Edit Rule</a>
                                    </th><?php }?>
                                </tr>
                            </thead>
                            <?php
    $query=mysqli_query($koneksi,"SELECT * FROM tb_rules GROUP BY id_evidence ORDER BY id_evidence ASC ")or die(mysqli_error());
	$no=0;
	while($row=mysqli_fetch_array($query)){
	$idpenyakit=$row['id_problem'];
	$no++;
	?>
                            <tr>
                                <td valign="top"><?php echo $row['id_evidence'];?></td>
                                <td><?php $idG=$row['id_evidence']; print_r($arrGejala["$idG"]);// echo $row['gejala'];?></td><?php $query_pb=mysqli_query($koneksi,"SELECT id_problem FROM tb_rules GROUP BY id_problem ");
	while($data_pb=mysqli_fetch_array($query_pb)){
	?>
                                <td><?php $kdpenyakit_B=$data_pb['id_problem'];
	$kdgejala_B=$row['id_evidence'];
	$query_CG=mysqli_query($koneksi,"SELECT * FROM tb_rules WHERE id_problem='$kdpenyakit_B' AND id_evidence='$kdgejala_B' ");
	while($data_GB=mysqli_fetch_array($query_CG)){ echo "<center>&#8730;</center>";
	echo "<center><strong><a title='Edit Nilai CF Pada Tiap Gejala' href='edit_cf.php?id_problem=$kdpenyakit_B&id_evidence=$kdgejala_B&cf=$data_GB[cf]'>cf=$data_GB[cf]</a></strong></center>"; }
	?></td><?php }?>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>

            </div>
        </div>

        <div class="row"></div>
        <div class="templatemo-panels">
            <div class="row"></div>
            <div class="row"></div>
        </div>
    </div>
</div>
<!-- Modal -->
<div
    class="modal fade"
    id="confirmModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
                <a href="sign-in.php" class="btn btn-primary">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Hapus Data-->
<div
    class="modal fade"
    id="confirmModal2"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Apakah Anda Ingin Hapus Data?</h4>
            </div>
            <div class="modal-footer">
                <a href="hpspenyakit.php" class="btn btn-primary">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/templatemo_script.js"></script>
<script type="text/javascript">
// Line chart
var randomScalingFactor = function () {
    return Math.round(Math.random() * 100)
};
var lineChartData = {
    labels: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July"
    ],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }, {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }
    ]

}

window.onload = function () {
    var ctx_line = document
        .getElementById("templatemo-line-chart")
        .getContext("2d");
    window.myLine = new Chart(ctx_line).Line(lineChartData, {responsive: true});
};

$('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

$('#loading-example-btn').click(function () {
    var btn = $(this);
    btn.button('loading');
    // $.ajax(...).always(function () {   btn.button('reset'); });
});
</script>
<?php include"footer.php"; ?>