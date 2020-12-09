<?php

	require 'config.php';
  
  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	if (isset($_POST['simpan']))
	{	

		$Id =htmlspecialchars($_POST['Id']);
		$Kode =htmlspecialchars($_POST['Kode']);
		$Jenisstatus =htmlspecialchars($_POST['Jenisstatus']);

			mysqli_query($conn, "UPDATE dbjenisstatus SET Kode='$Kode',
				Jenisstatus='$Jenisstatus'
				WHERE  Id='$Id'");

		header ("location:jenis_status.php");
	}
	
	$id = $_GET['id'];
	$query_mysqli = mysqli_query($conn, "SELECT * FROM dbjenisstatus WHERE Id='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){

?>

<?php 
include_once 'templates/header.php';
 ?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Edit Data</h3></center>
		<a href="jenis_status.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">
		<table>
			<form action="" method="POST" name="jss">						
					<td><input type="hidden" name="Id" required="" maxlength="9" size="15" value="<?php echo $data ["Id"];?>"></td>
				
				<tr>
					<td> Kode Status</td>
					<td>:</td>
					<td><input type="text" name="Kode" required id="Kode" value="<?php echo $data ["Kode"];?>"></td>
				</tr>
				<tr>
					<td>Jenis Status</td>
					<td>:</td>
					<td><input type="text" name="Jenisstatus" id="Jenisstatus" value="<?php echo $data ["Jenisstatus"];?>"></td>
				</tr>
					
				<tr>
					<td><button type="submit" class="btn btn-outline-primary" name="simpan" onclick="return confirm('Anda Yakin Mengedit Data?');">Update</button></td>
					<td></td>
				</tr>
			</form>

		</table>

	</div>
</div>
	<?php } ?>

 <?php 
include_once 'templates/footer.php';
 ?>