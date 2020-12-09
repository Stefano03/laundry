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
		$Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
		$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Jumlahkg =htmlspecialchars($_POST['Jumlahkg']);
		$Jumlahcucian =htmlspecialchars($_POST['Jumlahcucian']);
		$Hargakg =htmlspecialchars($_POST['Hargakg']);
		$Totalharga =htmlspecialchars($_POST['Totalharga']);
		$Tglterima =htmlspecialchars($_POST['Tglterima']);

			mysqli_query($conn, "UPDATE dbcucian SET Kode='$Kode',
				Namapelanggan='$Namapelanggan', 
				Jeniscucian='$Jeniscucian', 
				Jumlahkg='$Jumlahkg',
				Jumlahcucian='$Jumlahcucian', 
				Hargakg='$Hargakg',
				Totalharga ='$Totalharga',
				Tglterima ='$Tglterima'
				WHERE  Id='$Id'");

		header ("location:cucianbase.php");
	}
	
	$id = $_GET['id'];
	$query_mysqli = mysqli_query($conn, "SELECT * FROM dbcucian WHERE Id='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){

?>

<?php
include_once 'templates/header.php';
?>

<script type="text/javascript">
	function hit()
	{
	var Jumlahkg = parseFloat (document.forms.Pelanggan.Jumlahkg.value);
	var Hargakg = parseFloat (document.forms.Pelanggan.Hargakg.value);
	document.forms.Pelanggan.Totalharga.value = Jumlahkg * Hargakg;
	}
</script>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Updata Data Cucian</h3></center>
		<a href="cucianbase.php" class="btn btn-light mb-1" >Lihat Data</a>
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
				<tr>
					<td>Nama Pelanggan</td>
					<td>:</td>
					<td><input type="text" name="Namapelanggan" id="Namapelanggan" value="<?php echo $data ["Namapelanggan"];?>"></td>
				</tr>
				<td>Jenis Cucian</td>
				<td>:</td>
				<td><select name="Jeniscucian" id="Jeniscucian" class="form-control" onchange='changeValue(this.value)' required>
				  <option value="">-Pilih Jenis Cucian-</option>

				 <?php 
				 $result = mysqli_query($conn, "select * from dbjeniscucian");  
				 $jsArray = "var prdName = new Array();\n";
				 while ($row = mysqli_fetch_array($result)) {  
				 echo '<option name="Jeniscucian"  value="' . $row['Jeniscucian'] . '">' . $row['Jeniscucian'] . '</option>';  
				 $jsArray .= "prdName['" . $row['Jeniscucian'] . "'] = {Hargakg:'" . addslashes($row['Hargakg'])."'};\n";
				  }
				  ?>
				</select></td>
			</tr>
				<tr>
					<td>Jumlah/KG</td>
					<td>:</td> 
					<td><input onblur="return hit ();" type="text" name="Jumlahkg" id="Jumlahkg" value="<?php echo $data ["Jumlahkg"];?>"></td>
				</tr>
				<tr>
					<td>Jumlah Cucian</td>
					<td>:</td>
					<td><input type="text" name="Jumlahcucian" id="Jumlahcucian" value="<?php echo $data ["Jumlahcucian"];?>"></td>
				</tr>
				<tr>
					<td>Harga/KG</td>
					<td>:</td>
					<td><input readonly="readonly" onblur="return hit ();" type="text" name="Hargakg" id="Hargakg" value="<?php echo $data ["Hargakg"];?>">
					</td>
				</tr>
				<tr>
					<td>Total Harga</td>
					<td>:</td>
					<td><input readonly="readonly" type="text" name="Totalharga" id="Totalharga" value="<?php echo $data ["Totalharga"];?>">
					</td>
				</tr>
				<tr>
					<td>Tanggal Terima</td>
					<td>:</td>
					<td><input type="text" name="Tglterima" id="Tglterima" value="<?php echo $data ["Tglterima"];?>">
					</td>
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

	<script type="text/javascript"> 
	<?php echo $jsArray; ?>
	function changeValue(Id){
    document.getElementById('Hargakg').value = prdName[Id].Hargakg;
    // document.getElementById('Namapelanggan').value = prdName[Id].Namapelanggan;
    // document.getElementById('Totalharga').value = prdName[Id].Totalharga;
	};
	</script>

	
<?php 
include_once 'templates/footer.php';
 ?>