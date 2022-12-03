<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="TugasBesar.css">
	<title>Tugas Besar_Zeten</title>
</head>
<body>
	<center><h3>Form Pemesanan</h3></center>
	<!-- <div class="container"> -->
		<div id="box">
		<form method="POST" action="pesan.php">
			<table border="1" width="700px">
				<tr>
					<td width="40%" colspan="1">
						<input type="text" name="email" placeholder="Email anda.."></br>
					</td>
				</tr>
				<tr>
					<td width="40%" colspan="1">
						<input type="text" name="nama" placeholder="Nama.."></br>
					</td>
				</tr>
				<tr>
					<td width="40%" colspan="1">
						Album  :<select name="Album">
							<option value="NCT DREAM">Hot Sauce</option>
							<option value="NCT 127">Neo Zone</option>
							<option value="WAYV">KickBack</option>
					    </select></br>
					</td>
				</tr>
				<tr>
					<td width="40" colspan="1">
						Bayar  :
						<select name="Bayar">
							<option value="DP">DP</option>
							<option value="FullPayment">FullPayment</option>
					    </select></br>
					</td>
				</tr>
				<tr>
					<td width="40%" colspan="1">
					    <input type="text" name="banyak">
					</td>
				</tr>
					<tr>
						<td width="40%" colspan="1">
							<input type="text" name="Alamat" placeholder="Alamat"></br>
						</td>
					</tr>
					<tr>
						<td width="40%" colspan="1">
							<input type="text" name="kec" placeholder="Kecamatan"></br>
						</td>
					</tr>
					<tr>
						<td width="40%" colspan="1">
							<input type="text" name="kel" placeholder="Kelurahan"></br>
						</td>
					</tr>
					<tr>
						<td width="40%" colspan="1">
							<input type="text" name="kota" placeholder="kota">
						</td>
					</tr>
					<tr>
						<td width="40%" colspan="1">
						    <input type="text" name="KP" placeholder="KodePos">
						</td>
					</tr>
					<tr>
						<td width="40%">
						   <center> <input type="submit" name="button" class="tombol" value="Proses" align="center"/></center>
						</td>
					</tr>
				</table>
			</table>
		</form>		
	   </div>
	<!-- </div> -->
	<div id ="finish">
		<div id="end1">
			<h3>Total Belanja</h3>
		</div>
		<div id="end2">
			<?php
			if (isset($_POST['button'])) {
				$nama=$_POST['nama'];
				echo "Nama : " .$nama. "<br>";
				$Album=$_POST['Album'];
				echo "Album yang di beli : ".$Album. "<br>";
				$Banyak=$_POST['banyak'];
				echo "Banyak : " .$Banyak. "<br>";
				$Album=$_POST['Album'];
					if ($Album == 'NCT DREAM') {
					$harga = 190.000;
				}elseif ($Album == 'NCT 127') {
					$harga = 260.000;
				}else{
					$harga = 270.000;
				}
				$Bayar=$_POST['Bayar'];
				echo "Bayar : " .$Bayar. "<br>";
				$Bayar=$_POST['Bayar'];
				if ($Bayar == 'DP') {
					$pay = 100.000*$Banyak;
				}else{
					$pay = $harga*$Banyak;
				}
				$jumlah=$harga*$Banyak;
 	            echo "harga : " .$harga. "<br>";
 	            echo "Jumlah :" .$jumlah. "<br>";
				echo "Total yang dibayar = " .$pay;
			}
			?>
		</div>
		 <center> <input type="submit" onclick="button()" class="tombol" value="Proses" align="center"/></center>
	</div>
	<script type="text/javascript">
		function button(){
			alert("Silahkan Bayar di shopee/dana/BRI\nTerima Kasih sudah Belanja^^")
		}
	</script>
</body>
</html>