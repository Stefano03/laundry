<?php
require 'config.php';

  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	if (isset($_POST['submit'])){

		$Kode =htmlspecialchars($_POST['Kode']);
		$Namapelanggan =htmlspecialchars($_POST['Namapelanggan']);
		$Jeniscucian =htmlspecialchars($_POST['Jeniscucian']);
		$Statuspengerjaan =htmlspecialchars($_POST['Statuspengerjaan']);
		$Daritanggal =htmlspecialchars($_POST['Daritanggal']);

			$query_masukan ="INSERT INTO dbpengerjaan values ('','$Kode','$Namapelanggan','$Jeniscucian','$Statuspengerjaan','$Daritanggal')";

			$hasil_masukan = mysqli_query ($conn,$query_masukan);

			if ($hasil_masukan){

				 echo "
		 	<script>
		 	  alert ('data berhasil di Tambahkan!');
		 	document.location.href ='status_pengerjaan.php';
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
		<a href="status_pengerjaan.php" class="btn btn-light mb-1" >Lihat Data</a>
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
				<td>Kode Status</td>
				<td>:</td>
				<td><select name="Kode" id="Kode" class="form-control" onchange='changeValue(this.value)' required>
				  <option value="">-Pilih Kode Status-</option>

				 <?php 
				 $result = mysqli_query($conn, "select * from dbcucian");  
				 $jsArray = "var prdName = new Array();\n";
				 while ($row = mysqli_fetch_array($result)) {  
				 echo '<option name="Kode"  value="' . $row['Kode'] . '">' . $row['Kode'] . '</option>';  
				 $jsArray .= "prdName['" . $row['Kode'] . "'] = {Jeniscucian:'" . addslashes($row['Jeniscucian']) . "',Namapelanggan:'".addslashes($row['Namapelanggan'])."'};\n";
				  }
				  ?>
				</select></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td>:</td>
				<td><input readonly="readonly" type="text" name="Namapelanggan" id="Namapelanggan"></td>
			</tr>
			<tr>
				<td>Jenis Cucian</td>
				<td>:</td>
				<td><input readonly="readonly" type="text" name="Jeniscucian" id="Jeniscucian"></td>
			</tr>
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
			<tr>
				<td>Dari Tanggal</td>
				<td>:</td>
				<td><input type="text" name="Daritanggal" id="Daritanggal" value="<?php echo date('d-m-Y') ?>"></td>
			</tr>

		</table>

		<tr>
			<td></td>
			<td><button type="submit" class="btn btn-success mb-1" name="submit">Simpan</button></td>
			<td></td>
			<td><button class="btn btn-warning mb-1" type="reset">Reset</button></td>
		</tr>

	</form>
</div>
</div>

	<script type="text/javascript"> 
	
	<?php echo $jsArray; ?>
	function changeValue(Id){
    document.getElementById('Jeniscucian').value = prdName[Id].Jeniscucian;
    document.getElementById('Namapelanggan').value = prdName[Id].Namapelanggan;
	};
	</script>

<?php 
include_once 'templates/footer.php';
 ?>