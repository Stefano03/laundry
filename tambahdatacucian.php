<?php
require 'config.php';

  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	// if (isset($_POST['submit'])){
		
	// 	$Kode =htmlspecialchars($_POST['Kode']);
	// 	$Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
	// 	$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
	// 	$Jumlahkg =htmlspecialchars($_POST['Jumlahkg']);
	// 	$Jumlahcucian =htmlspecialchars($_POST['Jumlahcucian']);
	// 	$Hargakg =htmlspecialchars($_POST['Hargakg']);
	// 	$Totalharga =htmlspecialchars($_POST['Totalharga']);
	// 	$Tglterima =htmlspecialchars($_POST['Tglterima']);

	// 		$query_masukan ="INSERT INTO dbcucian values ('','$Kode','$Namapelanggan','$Jeniscucian','$Jumlahkg','$Jumlahcucian','$Hargakg','$Totalharga','$Tglterima')";

	// 		$hasil_masukan = mysqli_query ($conn,$query_masukan);

	// 		if ($hasil_masukan){

	// 			 echo "
	// 	 	<script>
	// 	 	  alert ('data berhasil di Tambahkan!');
	// 	 	document.location.href ='tambahdatacucian.php';
	// 		</script>
	// 	 	";
	// 	 } else {
	// 		echo "
	// 			<script>
	// 			alert ('Data Gagal di Tambahkan! Periksa kembali Nomor Id ');
	// 			document.location.href ='tambahdatacucian.php';
	// 		</script>
	// 		";
	// 	}
			
	// 	}
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
			<center><h3> Tambah Data</h3></center>
		<a href="cucianbase.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">

	<form action="cetak_struk.php" method="POST" name="Pelanggan">
		<table>
		<tr>
			
			<td><input type="hidden" name="Id"></td>
		</tr>
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><input type="text" name="Kode" autofocus required ></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td>:</td>
			<td><input type="text" name="Namapelanggan" required></td>
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
			<td>Jumlah KG</td>
			<td>:</td>
			<td><input onblur="return hit ();" type="number" name="Jumlahkg" id="Jumlahkg" required></td>
		</tr>
		<tr>
			<td>Jumlah Cucian</td>
			<td>:</td>
			<td><input type="number" name="Jumlahcucian" required id="Jumlahcucian"></td>
		</tr>
		<tr>
			<td>Harga KG</td>
			<td>:</td>
			<td><input readonly="readonly" onblur="return hit ();" type="number" name="Hargakg" required id="Hargakg"></td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td>:</td>
			<td><input readonly="readonly" type="number" name="Totalharga" id="Totalharga"></td>
		</tr>
		<tr>
			<td>Tanggal Terima</td>
			<td>:</td>
			<td><input type="text" name="Tglterima" id="Tglterima" value="<?php echo date('d-m-Y') ?>"></td>
		</tr>
	</table >
		
		<tr class="mb-2" >
			<td><button target="blank" class="btn btn-success" type="submit" name="submit">Simpan</button></td>
			<td></td>
			<td><button class="btn btn-warning" type="reset">Reset</button></td>
		</tr>

	</form>
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