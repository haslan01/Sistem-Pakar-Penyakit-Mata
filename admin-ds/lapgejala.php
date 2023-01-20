<?php include"header.php"; ?>

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content">
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Admin Panel</a>
                    </li>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Laporan</a>
                    </li>
                    <li class="active">Laporan Gejala</li>
                </ol>
                <h1>Laporan Data Gejala</h1>
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
                        <div class="btn-group pull-right" id="templatemo_sort_btn">
                            <button type="button" class="btn btn-default">Pilih Penyakit</button>
                            <button
                                type="button"
                                class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php 	$sqlp = "SELECT * FROM tb_penyakit ORDER BY kdpenyakit";
	$qryp = mysqli_query($koneksi,$sqlp) or die ("SQL Error: ".mysqli_error());
	while ($datap=mysqli_fetch_array($qryp)) {
		?>
                                <li>
                                    <a href="../admin/lapgejala.php?data=<?php echo $datap['id'];?>"><?php echo $datap['kdpenyakit']."|".$datap['nama_penyakit'];?></a>
                                </li><?php } ?>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>KD Gejala</th>
                                        <th>Gejala</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
					if(isset($_GET['data'])){
	$kdsakit=$_GET['data'];
	$sql = "SELECT * FROM tb_rules,tb_gejala WHERE tb_rules.id_problem='$kdsakit' AND tb_gejala.id=tb_rules.id_evidence ";
	}else { $sql = "SELECT * FROM tb_rules,tb_gejala WHERE tb_gejala.id=tb_rules.id_evidence ";}
	$qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
	$no=0;
	while ($data = mysqli_fetch_array ($qry)) {
	$no++;
   ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $data['kdgejala'];?></td>
                                        <td><?php echo $data['gejala'];?></td>
                                        <td>
                                            <a
                                                href="javascript:;"
                                                data-toggle="modal"
                                                data-target="#confirmModal2"
                                                class="btn btn-link">Delete</a>
                                        </td>
                                    </tr><?php }?>
                                </tbody>
                            </table>
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