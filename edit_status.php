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
		// $Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
		// $Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Statuspengerjaan =htmlspecialchars($_POST['Statuspengerjaan']);
		// $Dariterima =htmlspecialchars($_POST['Dariterima']);

			mysqli_query($conn, "UPDATE dbpengerjaan SET Kode='$Kode',
				-- Namapelanggan='$Namapelanggan', 
				-- Jeniscucian='$Jeniscucian',
				Statuspengerjaan ='$Statuspengerjaan'
				-- Daritanggal ='$Daritanggal'
				WHERE  Id='$Id'");

		header ("location:status_pengerjaan.php");
	}
	
	$id = $_GET['id'];
	$query_mysqli = mysqli_query($conn, "SELECT * FROM dbpengerjaan WHERE Id='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){

?>

<?php 
include_once 'templates/header.php';
 ?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Tambah Data</h3></center>
		<a href="status_pengerjaan.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">

		<table>
			<form action="" method="POST" name="Pelanggan">						
					<td><input type="hidden" name="Id" required="" maxlength="9" size="15" value="<?php echo $data ["Id"];?>"></td>
				
				<tr>
					<td> Kode Cucian</td>
					<td>:</td>
					<td><input type="text" name="Kode" required id="Kode" size="15" value="<?php echo $data ["Kode"];?>"></td>
				</tr>
				<!-- <tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="Namapelanggan" id="Namapelanggan" value="<?php echo $data ["Namapelanggan"];?>"></td>
				</tr> -->
				
				<tr>
				<td>Status Pengerjaan</td>
				<td>:</td>
				<td><select onchange="changevalue(this.value)" name="Statuspengerjaan">
			 	<option  selected="selected">--pilih Jenis Status--</option>
			 	<option value="" >
			 <?php
			 	$query = "SELECT * FROM dbjenisstatus";
			 	$hasil = mysqli_query($conn, $query);
			 	while ($data = mysqli_fetch_array($hasil))
			 	{
			 	echo "<option value='".$data['Jenisstatus']."'>".$data['Jenisstatus']."</option>";
				 }
			 	?>
			 	</option>
			 	</select></td>
			</tr>
				
				<!-- <tr>
					<td>Dari Tanggal</td>
					<td>:</td>
					<td><input type="text" name="Daritanggal" id="Daritanggal" value="<?php echo $data ["Daritanggal"];?>">
					</td>
				</tr> -->

					
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