<?php
require 'config.php';


  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	if (isset($_POST['submit'])){

		$Kode =htmlspecialchars($_POST['Kode']);
		$Jenisstatus =htmlspecialchars($_POST['Jenisstatus']);
		

			$query_masukan ="INSERT INTO dbjenisstatus values ('','$Kode', '$Jenisstatus')";

			$hasil_masukan = mysqli_query ($conn,$query_masukan);

			if ($hasil_masukan){

				 echo "
		 	<script>
		 	  alert ('data berhasil di Tambahkan!');
		 	document.location.href ='jenis_status.php';
			</script>
		 	";
		 } else {
			echo "
				<script>
				alert ('Data Gagal di Tambahkan! Periksa kembali Nomor Id ');
				document.location.href ='tambahstatus.php';
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
		<a href="jenis_status.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">
	
	<form action="" method="POST">
		<table>
			<tr>
				<td><input type="hidden" name="Id"></td>
			</tr>			
			<tr>
				<td>Kode</td>
				<td>:</td>
				<td><input type="text" name="Kode" id="Kode"></td>
			</tr>
			<tr>
				<td>Jenis Status</td>
				<td>:</td>
				<td><input type="text" name="Jenisstatus" id="Jenisstatus"></td>
			</tr>

		</table>

		<tr>
			<td></td>
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
