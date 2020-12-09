<?php
require 'config.php';

  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	if (isset($_POST['submit'])){
		
		$Kode =htmlspecialchars($_POST['Kode']);
		$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Hargakg =htmlspecialchars($_POST['Hargakg']);

			$query_masukan ="INSERT INTO dbjeniscucian values ('','$Kode','$Jeniscucian','$Hargakg')";

			$hasil_masukan = mysqli_query ($conn,$query_masukan);

			if ($hasil_masukan){

				 echo "
		 	<script>
		 	  alert ('data berhasil di Tambahkan!');
		 	document.location.href ='';
			</script>
		 	";
		 } else {
			echo "
				<script>
				alert ('Data Gagal di Tambahkan! Periksa kembali Nomor Id ');
				document.location.href ='';
			</script>
			";
		}
			
		}
?>

<?php 
include_once 'templates/header.php';
 ?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Tambah Data</h3></center>
		<a href="jeniscucian.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">
			
	<form action="" method="POST" name="Pelanggan">
		<table>
		<tr>
			<td><input type="hidden" name="Id"></td>
		</tr>
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><input type="text" autofocus name="Kode" required ></td>
		</tr>
		
		<tr>
			<td>Jenis Cucian</td>
			<td>:</td>
			<td><input type="text" name="Jeniscucian" required ></td>
		</tr>
		<tr>
			<td>Harga/KG</td>
			<td>:</td>
			<td><input type="number" name="Hargakg" required id="Hargakg"></td>
		</tr>
		
	</table>
		
		<tr>
			<td><button type="submit" class="btn btn-success" name="submit">Simpan</button></td>
			<td></td>
			<td><button class="btn btn-warning" type="reset">Reset</button></td>
		</tr>

	</form>
</div>
</div>

 <?php 
include_once 'templates/footer.php';
 ?>