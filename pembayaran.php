<?php
	require 'config.php';
  
  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	$query="SELECT * FROM dbkasir ORDER BY Id DESC";
	$hasil= mysqli_query($conn,$query);
	$no = 1;
?>


<?php
include_once 'templates/header.php';
?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Data Cucian</h3></center>
		<a href="form_kasir.php" class="btn btn-light mb-1" >Tambah Data</a>
		</div>
	</div>

	<table border="1" cellspacing="0" cellpadding="1">
		<th>No</th>
		<th>Kode Pembayaran</th>
		<th>Jenis Cucian</th>
		<th>Nama Pelanggan</th>
		<th>Tanggal Pengambilan</th>
		<th>Total Harga</th>

		<tbody>
				<?php

					while ($data = mysqli_fetch_array($hasil)){
					 ?>
					 <tr>
					 	<td><?php echo $no++; ?></td>				 	
					 	<td><?php echo $data['Kode']; ?></td>
					 	<td><?php echo $data['Jeniscucian']; ?></td>
					 	<td><?php echo $data['Namapelanggan']; ?></td>
					 	<td><?php echo $data['Tanggalpengambilan']; ?></td>
					 	<td><?php echo $data['Totalharga']; ?></td>					 	
					  </tr>

		<?php
	}
?>	
	</tbody>		
	</table>


 <?php 
include_once 'templates/footer.php';
 ?>