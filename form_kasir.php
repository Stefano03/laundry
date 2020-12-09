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
	$Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
	$Tanggalpengambilan =htmlspecialchars($_POST['Tanggalpengambilan']);
	$Totalharga =htmlspecialchars($_POST['Totalharga']);

	$query= "INSERT INTO dbkasir values ('','$Kode','$Jeniscucian','$Namapelanggan','$Tanggalpengambilan', '$Totalharga')";

			$hasil = mysqli_query ($conn,$query);

		// 	if ($hasil){
		// 	echo "
		//  	<script>
		//  	 alert ('Data Berhasil di Dikirim!');
		//  	document.location.href ='pembayaran.php';
		// 	</script>
		//  	";
		//  } else {
		// 	echo "
		// 		<script>
		// 		alert ('Data Gagal Dikirim! Periksa Kembalian ');
		// 		document.location.href ='pembayaran.php';
		// 	</script>
		// 	";
		// }
}
?>

<?php
include_once 'templates/header.php';
?>

    <script type="text/javascript">
	function hit()
	{
	var Totalharga = parseFloat (document.forms.kasir.Totalharga.value);
	var Tunai = parseFloat (document.forms.kasir.Tunai.value);
	document.forms.kasir.Kembalian.value = Tunai - Totalharga;
	}
</script>

<!-- <div class="container mt-3">  -->
	<div class="row">
		<div class= "col-lg-5">
			<center><h3>Kasir</h3></center>
		<a href="pembayaran.php" class="btn btn-light mb-1" >Lihat Data</a>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">

	<form action="" method="POST" name="kasir">
		
		<table>
			<tr>
				<td><input type="hidden" name="Id"></td>
			</tr>
			
			
			<tr>
				<td>Kode Pembayaran</td>
				<td>:</td>
				<td><select name="Kode" id="Kode" class="form-control" onchange='changeValue(this.value)' required>
				  <option value="">-Pilih Kode Pembayaran-</option>

				 <?php 
				 $result = mysqli_query($conn, "select * from dbcucian");  
				 $jsArray = "var prdName = new Array();\n";
				 while ($row = mysqli_fetch_array($result)) {  
				 echo '<option name="Kode"  value="' . $row['Kode'] . '">' . $row['Kode'] . '</option>';  
				 $jsArray .= "prdName['" . $row['Kode'] . "'] = {Jeniscucian:'" . addslashes($row['Jeniscucian']) . "',Namapelanggan:'".addslashes($row['Namapelanggan'])."',Totalharga:'".addslashes($row['Totalharga'])."'};\n";
				  }
				  ?>
				</select></td>
			</tr>
			<tr>
				<td>Jenis Cucian</td>
				<td>:</td>
				<td><input readonly type="text" name="Jeniscucian" id="Jeniscucian"></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td>:</td>
				<td><input readonly type="text" name="Namapelanggan" id="Namapelanggan"></td>
			</tr>
			<tr>
				<td>Tanggal Pengambilan</td>
				<td>:</td>
				<td><input readonly type="text" name="Tanggalpengambilan" value="<?php echo date('d-m-Y') ?>"></td>
			</tr>
			<tr>
				<td>Total Bayar</td>
				<td>:</td>
				<td><input readonly onblur="return hit ();" type="text" name="Totalharga" id="Totalharga" size="12" style="height: 30px; font-size: 25px; "></td>
			</tr>
			<tr>
				<td>Tunai</td>
				<td>:</td>
				<td><input onblur="return hit ();" type="text" name="Tunai" size="12" style="height: 30px; font-size: 25px; "></td>
			</tr>
			<tr>
				<td>Kembalian</td>
				<td>:</td>
				<td><input readonly="readonly" type="text" name="Kembalian" size="12" style="height: 30px; font-size: 25px; "></td>
			</tr>
		</table>
			<tr>
				<td><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
				<td><button class="btn btn-warning" type="reset">Reset</button></td>
			</tr>		
	</form>
</div>
</div>



	<script type="text/javascript"> 
	
	<?php echo $jsArray; ?>
	function changeValue(Id){
    document.getElementById('Jeniscucian').value = prdName[Id].Jeniscucian;
    document.getElementById('Namapelanggan').value = prdName[Id].Namapelanggan;
    document.getElementById('Totalharga').value = prdName[Id].Totalharga;
	};
	</script>



 <?php 
include_once 'templates/footer.php';
 ?>