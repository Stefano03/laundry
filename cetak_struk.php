<!-- <!DOCTYPE html>
<html>
<head>
	<title>town Laundry</title>
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body> -->
<?php
include_once 'templates/header.php';
?>
	<div class="row">
		<div class= "col-lg-3">
			<center><h3>tOWN LAUNDRY</h3></center>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">

	<form action="" method="POST" name="Pelanggan">
		<table>
		
	<?php
	if(isset($_GET['submit']))

	echo "Kode         :". $_POST["Kode"]. "<br>";
	echo "Namapelanggan:". $_POST["Namapelanggan"]. "<br>";
	echo "Jeniscucian  :". $_POST["Jeniscucian"]. "<br>";
	echo "Jumlah KG    :". $_POST["Jumlahkg"]. "<br>";
	echo "Jumlah Cucian:". $_POST["Jumlahcucian"]. "<br>";
	echo "Harga KG     :". $_POST["Hargakg"]. "<br>";
	echo "Total Harga  :". $_POST["Totalharga"]. "<br>";
  
	echo "Tgl Terima   :". $_POST["Tglterima"]. "<br>"


?>

	</table >
		
		<!-- <tr class="mb-2" >
			<td><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
		</tr>
 -->
	</form>

<script>
window.print();
</script>
</div>
</div>

<!-- <?php
require 'config.php';

	if (isset($_POST['submit'])){
		
		$Kode =htmlspecialchars($_POST['Kode']);
		$Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
		$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Jumlahkg =htmlspecialchars($_POST['Jumlahkg']);
		$Jumlahcucian =htmlspecialchars($_POST['Jumlahcucian']);
		$Hargakg =htmlspecialchars($_POST['Hargakg']);
		$Totalharga =htmlspecialchars($_POST['Totalharga']);
		$Tglterima =htmlspecialchars($_POST['Tglterima']);

			$query_masukan ="INSERT INTO dbcucian values ('','$Kode','$Namapelanggan','$Jeniscucian','$Jumlahkg','$Jumlahcucian','$Hargakg','$Totalharga','$Tglterima')";

			$hasil_masukan = mysqli_query ($conn,$query_masukan);

			if ($hasil_masukan){

				 echo "
		 	<script>
		 	  alert ('data berhasil di Tambahkan!');
		 	document.location.href ='tambahdatacucian.php';
			</script>
		 	";
		 } else {
			echo "
				<script>
				alert ('Data Gagal di Tambahkan! Periksa kembali Nomor Id ');
				document.location.href ='tambahdatacucian.php';
			</script>
			";
		}
			
		}
?> -->
