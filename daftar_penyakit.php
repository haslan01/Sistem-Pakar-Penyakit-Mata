<?php include "include/header.php"; ?>

	<!-- akhir menu navigasi -->

	<div class="container">			
		<!-- membuat jumbotron -->
		<div class="jumbotron">
			<center>			
				<h2>Daftar Penyakit Yang Terdapat Dalam Sistem</h2>
        <table class="table" >
          <thead>
				  	<tr > 
					    <th ><b>No</b></th>
					    <th ><strong>Deskripsi  Penyakit</strong></th>
				  	</tr>
					</thead>
				  <?php 
				  	include "admin-ds/koneksi.php";
					$sql = "SELECT * FROM tb_penyakit ORDER BY kdpenyakit";
					$qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error($koneksi));
					$no=0;
					while ($data=mysqli_fetch_array($qry)) {
					$no++;
				  ?>
				  <tbody>
				  <tr> 
				    <td><?php echo $no; ?></td>
				    <td><?php echo "<h3><em>$data[nama_penyakit]</em></h3>"; ?>
				      <ul>
				      	<li><label>Definisi Penyakit :</label><p><?php echo "$data[definisi]";?></p></li>
				        <li><label>Solusi :</label><p><?php echo "$data[solusi]";?></p></li>
				      </ul>				      
				     </td>
				  </tr></tbody>
				  <?php } ?>
				</table>
			</center>
		</div>
		<!-- akhir jumbotron -->

<?php include "include/footer.php"; ?>