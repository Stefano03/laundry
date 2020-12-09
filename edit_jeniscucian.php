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
		$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Hargakg =htmlspecialchars($_POST['Hargakg']);

			mysqli_query($conn, "UPDATE dbjeniscucian SET Kode='$Kode', 
				Jeniscucian='$Jeniscucian',
				Hargakg ='$Hargakg'
				WHERE  Id='$Id'");

		header ("location:jeniscucian.php");
	}
	
	$id = $_GET['id'];
	$query_mysqli = mysqli_query($conn, "SELECT * FROM dbjeniscucian WHERE Id='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){

?>

<?php 
include_once 'templates/header.php';
 ?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Edit Data</h3></center>
		<a href="jeniscucian.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">
		<table>
			<form action="" method="POST">						
					<td><input type="hidden" name="Id" required="" maxlength="9" size="15" value="<?php echo $data ["Id"];?>"></td>
				
				<tr>
					<td> Kode </td>
					<td>:</td>
					<td><input type="text" name="Kode" required="" maxlength="9" size="15" value="<?php echo $data ["Kode"];?>"></td>
				</tr>
				<tr>
					<td>Jenis Cucian</td>
					<td>:</td>
					<td><input type="text" name="Jeniscucian" maxlength="250" value="<?php echo $data ["Jeniscucian"];?>"></td>
				</tr>
				<tr>
					<td>Harga/KG</td>
					<td>:</td> 
					<td><input type="text" name="Hargakg" maxlength="30" value="<?php echo $data ["Hargakg"];?>"></td>
				</tr>
					
				<tr>
					<td><button type="submit" class="btn btn-outline-primary" name="simpan" onclick="return confirm('Anda Yakin Mengedit Data?');">Update</button></td>
					<td></td>
				</tr>
			</form>

		</table>
	<?php } ?>
</div>
</div>
 <?php 
include_once 'templates/footer.php';
 ?>