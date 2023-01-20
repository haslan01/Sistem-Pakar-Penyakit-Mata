<?php include "include/header.php"; ?>

	<!-- akhir menu navigasi -->
	<!-- <nav class="nav"> -->
	<div class="container">			
		<!-- membuat jumbotron -->
		<div class="jumbotron">
			<center>			
				<h2>Proses Diagnosa Penyakit Mata</h2>
                <?php include "admin/koneksi.php"; ?>
<?php include "admin/koneksi2.php"; ?>
<table class="table">
  <tr>
    <td><center><strong>Pilihlah Gejala Yang Terjadi Alami..!</strong></center></td>
  </tr>
  <tr>
    <td style="padding:;">
<form method="post" >
<?php
//-- menampilkan daftar gejala
//$arrKDGejala=array();
//$arrKDGejalaSelect=array();
$sqli="SELECT * FROM tb_gejala ORDER BY id ASC ";
$result=$db->query($sqli);
while($row=$result->fetch_object()){
    echo "<input type='checkbox' name='evidence[]' value='{$row->id}'"
         .(isset($_POST['evidence'])?(in_array($row->id,$_POST['evidence'])?" checked":""):"")
        ."> {$row->kdgejala} {$row->gejala}<br>";
}
?><br><br><br><br><br>
<center><input type="submit" value="Proses Diagnosa Penyakit" class="btn btn-primary"></center><br>
</form>


<?php
//mengambil nilai gejala yang dipilih
if(isset($_POST['evidence'])){
	if(count($_POST['evidence'])<2){
		echo "Pilih minimal 2 gejala";
	}else{
		echo "<strong>Menentukan Nilai Densitas (m) Awal</strong>";
		echo "<div class=''>Gejala Yang dipilih :</div>"; 
		$arrKDGejalaSelect=$_POST['evidence'];
		foreach($arrKDGejalaSelect as $kdGSelect){ 
			echo $kdGSelect." | ";
			$queryG=mysqli_query($koneksi,"SELECT * FROM tb_gejala WHERE id='$kdGSelect' "); 
			while($dataG=mysqli_fetch_array($queryG)){ echo $dataG['gejala']."<br>";}
			}
		echo "</div>";
		$sql = "SELECT GROUP_CONCAT(b.kdpenyakit), a.cf, a.id_evidence
			FROM tb_rules a
			JOIN tb_penyakit b ON a.id_problem=b.id
			WHERE a.id_evidence IN(".implode(',',$_POST['evidence']).") 
			GROUP BY a.id_evidence ORDER BY a.id_evidence ASC ";
		$result=$db->query($sql);
		$evidence=array();
		//$gejalaSelect=array();
		while($row=$result->fetch_row()){
			//print_r($row[2]);
			$evidence[]=$row;
			//$gejalaSelect[]=$row[0];
			//masukkan kode perhitungannya dibawah ini
		
		} $no=0;
		echo "<br>";
		echo "<div class=''>Densitas (m) Awal";
		echo "<table class='table' border='1'> ";
		echo "<tr><td colspan='5'><center>Tabel 1 Densitas (m) Awal</center</td></tr>";
		echo "<tr>";
		echo "<td><strong>No</strong></td>";
		echo "<td><strong>Gejala</strong></td>";
		echo "<td><strong>Penyakit</strong></td>";
		echo "<td><strong>Densitas</strong></td>";
		echo "<td><strong>Plausability</strong></td>";
		echo "</tr>";
		foreach($evidence as $kdgejala){
			echo "<tr>"; $no=$no+1;
			echo "<td>$no</td>";
			echo "<td>"; 
			$queryG=mysqli_query($koneksi,"SELECT * FROM tb_gejala WHERE id='$kdgejala[2]' "); 
			$dataG=mysqli_fetch_array($queryG); 
			echo $dataG['id']." | ".$dataG['gejala']."<br>";
            echo"</td>";
			echo "<td>"; print_r($kdgejala[0]); echo "</td>";
			echo "<td>"; print_r($kdgejala[1]); echo"</td>";
			echo "<td>"; print_r(1-$kdgejala[1]); echo"</td>"; echo "</tr>";
			}unset($kdgejala);
		echo "</table>";
		echo "</div>";
?>
<!--<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Menentukan Nilai Densitas (m) Baru</strong></p>
<?php
		//--- menentukan environement
		$sql="SELECT GROUP_CONCAT(kdpenyakit) FROM tb_penyakit ";
		$result=$db->query($sql);
		$row=$result->fetch_row();
		$fod=$row[0];
		//$densitas_baru=array(); echo "<br>";
echo "<table class='table'  >";
//menghitung nilai densitas (m) baru
while(!empty($evidence)){ 
echo "<tr><td colspan='3'><center>Tabel 2 :Aturan kombinasi untuk m<sub>3</sub></center</td></tr>";
echo "<tr>";
		//nilai pada Y1 baris atas
		echo "<td>&nbsp;</td>";
		echo "<td >";
			$densitas1[0]=array_shift($evidence); 
			echo "<span class='Y1'>M<sub>2</sub>"; echo "{"; print_r($densitas1[0][0]); echo "}<br>";
			print_r($densitas1[0][1]); 
			echo "</span>";
		echo "</td>";
		echo "<td >";
		//nilai pada Y2 baris atas
			$densitas1[1]=array($fod,1-$densitas1[0][1]); 
			echo "<span class='Y2'>M<sub>2</sub>{&theta;}<br>"; $Y2=1-$densitas1[0][1]; echo " $Y2</span>";
			$densitas2=array();
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>";
			if(empty($densitas_baru)){
				//nilai pada X1 baris 1
				//echo "tidak ada densitas baru<br>";
				$densitas2[0]=array_shift($evidence);
				echo "<span class='X1'>M<sub>1</sub>";
				echo "{"; print_r($densitas2[0][0]); echo "}<br>";
				echo ""; print_r($densitas2[0][1]); echo "<br>";
				 echo "</span><br>"; 
			}else{
				foreach($densitas_baru as $k=>$r){
					//nilai pada X1 baris 2; jika ad densitas baru
					if($k!="&theta;"){
						//print_r($densitas2);echo "<br>";
						$densitas2[]=array($k,$r); 
						//echo "<span class='X1'>[nilai X1 baris 2 ";
						echo "<span class=''>m<sub>$m</sub>{";
						//print_r($densitas2[0][0]); echo "<br>";
						//print_r($densitas2[0][1]);
						print_r($k); echo"}<br>"; print_r($r);
						echo "</span>";
					}
				}
			}
		echo "</td>"; //bagian y1
		echo "<td valign='top' colspan='2' rowspan='2'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td valign='top'>";
			$theta=1;
			//nilai X1 baris 2 teta
			foreach($densitas2 as $d) $theta-=$d[1]; echo "<span class=''>M<sub>1</sub>{&theta;}<br>".$theta."</span>";
			$densitas2[]=array($fod,$theta); 
			//print_r($theta);
			//echo"<p>densitas2[0] = ".print_r($densitas2[0][0])." | densitas2[1] = ".print_r($densitas2[0][1])."</p>";
			$m=count($densitas2); echo "count data M = $m";
		echo "</td>";
		echo "<td colspan='2'>y2&nbsp;</td>"; 
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>x2&nbsp;</td>"; 
		echo "<td colspan='2' valign='top'><div class=''>";
			$densitas_baru=array();
			for($y=0;$y<$m;$y++){
				for($x=0;$x<2;$x++){
					if(!($y==$m-1 && $x==1)){
						$v=explode(',',$densitas1[$x][0]);
						$w=explode(',',$densitas2[$y][0]);
						sort($v); 
						sort($w); 
						$vw=array_intersect($v,$w); 
						//mencari nilai irisan	
						if(empty($vw)){
							echo "<span class='densitas'>kosong";
							$k="&theta;"; echo " $k<br>";
							echo $nilaiX1Y1;
							echo "</span>"; 
						}else{
							//echo "<td rowspan='2'>";
							//echo "<br><span class='teta2'>jika data vw ADA maka tampilkan ";
							$k=implode(',',$vw); //echo "{".print_r($k)."}= $nilaiX1Y1"; 
							echo "<span class='densitas'>";
										$nilaiX1Y1=$densitas1[$x][1]*$densitas2[$y][1]; 
										foreach($vw as $vwHasil){ print_r($vwHasil);} echo "<br>"; print_r($nilaiX1Y1);
										echo "</span>";
						}
						if(!isset($densitas_baru[$k])){
							//echo "data Y1r2";
							//echo "<td> y1 r3 ";
							$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
							//echo "<span class='Y1r2'>Y1r2 = "; 
							$k=implode(',',$vw); //echo $k. "<br>"; 
						}else{
							$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
							//echo "<p>M <sub>3b</sub> : "; print_r($densitas_baru[$k]);echo"|"; print_r($densitas1[$x][1]);
						}
					}
				} 
			}	echo "<span class='densitas'>&theta;<br>"; $dataX2=$theta; $dataY2=$Y2; $Y3=$dataX2*$dataY2; echo $Y3."</span>";
echo "</div></td></tr>";
echo "<tr>";
echo "<td colspan='3'>";
			echo "Merujuk pada rumus [DST-07] evidential conflict-nya belum ada, maka nilainya adalah k=0, sehingga dapat dihitung berdasarkan persamaan [DST-06]:";
			echo "<div style='border:1px solid #ccffcc;' >";
			//print_r($densitas_baru);echo"<br>";
			print_r($k); echo "<br>";
			print_r($nilaiX1Y1); echo "<br>";
			print_r($k); echo "<br>"; //print_r($k);echo"<br>";
			foreach($densitas_baru as $k=>$d){
				echo $d."[".$k."]";
				if($k!="&theta;"){
					$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
					
					echo "m<sub>$m</sub>{"; print_r($k); echo "} =$d /(1-(";print_r($d);echo "<br>";
					echo "m<sub>$m</sub>{"; print_r($k); echo "} = ";print_r($densitas_baru[$k]); echo "<br>";
				}
			}
			echo "</div>";
			
			//hasil perhitungan densitas awal m ke n
			echo "Sehingga dari perhitungan #2 didapatkan :";
			
			foreach($densitas_baru as $kdPdensitas=>$nilaiPDensitas){
				echo "m<sub>11</sub>("; print_r($kdPdensitas); echo ") = "; print_r($nilaiPDensitas); echo "<br>";
				}
echo "</td></tr>";
		} //## end --menghitung nilai densitas (m) baru
echo "</table>";
		//--- perangkingan
		unset($densitas_baru["&theta;"]);
		arsort($densitas_baru);
		//print_r ($densitas_baru);
	?>
    <p style="font-weight:bold; text-align:center; background:#06F;"><strong>Hasil Perangkingan</strong></p>-->
<?php	
$arrPenyakit=array(); 
$queryPasien=mysqli_query($koneksi,"SELECT * FROM tbpasien ORDER BY idpasien DESC"); $dataPasien=mysqli_fetch_array($queryPasien);
$queryP=mysqli_query($koneksi,"SELECT * FROM tb_penyakit"); while($dataP=mysqli_fetch_array($queryP)){ $arrPenyakit["$dataP[kdpenyakit]"]=$dataP['nama_penyakit']; }	
		echo "<center>---=== Hasil Diagnosa ===--- </center>";
		echo "<br>";
		//print_r($densitas_baru);echo "<hr>"; 
		$dataSama=array();
		$dataSama=array_intersect_key($arrPenyakit,$densitas_baru);
		//print_r($dataSama); echo "<hr>";
		foreach($dataSama as $k=>$a){ 
			foreach($densitas_baru as $kdpenyakit=>$ranking){
			//echo "m<sub>$m</sub>("; print_r($kdpenyakit); echo ") = "; print_r($ranking); echo "<br>";
			//echo "m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
			//echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br>";
			if($k==$kdpenyakit){ 
			//mengambil solusi penyakit
			$strS=mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE kdpenyakit='$k' ");
			$dataS=mysqli_fetch_array($strS); 
				echo "<strong>m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
				echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit],4)."<br></strong>";
				echo "Solusi Penanganan : ".$dataS['solusi']."<hr>";
				$persen=round($densitas_baru[$kdpenyakit]*100,2);
				//menyimpan data pasien
				$idPasien=$dataPasien['idpasien'];
				$querySimpanP=mysqli_query($koneksi,"INSERT INTO tb_hasil (idpasien,kdpenyakit,persentase,tanggal) VALUES ('$idPasien','$k','$persen', NOW() ) ");
			 }
			}
		}
        //--- perangkingan
        unset($densitas_baru["&theta;"]);
        arsort($densitas_baru);
        //print_r($densitas_baru);
        
        //--- menampilkan hasil akhir
        $codes=array_keys($densitas_baru); 
        $final_codes=explode(',',$codes[0]);
        $sql="SELECT GROUP_CONCAT(nama_penyakit)  
        FROM tb_penyakit  
        WHERE kdpenyakit IN('".implode("','",$final_codes)."')"; 
        $result=$db->query($sql); 
        $row=$result->fetch_row(); 
        echo "Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]],4);
        //echo "Persentase Kesimpulan";
        //echo "0%-50%   : Sedikit Kemungkinan atau Kemungkinan Kecil";
        //echo "51%-79%  : Pasti";
        //echo "80%-90%  : Kemungkinan Besar";
        //echo "91%-100% : Kemungkinan Besar";


    }
  }
?></td>
  </tr>
  <tr  >
    <td>&nbsp;</td>
  </tr>
</table>
			</center>
		</div>
	</div>
</nav>
		<!-- akhir jumbotron -->

<?php include "include/footer.php"; ?>