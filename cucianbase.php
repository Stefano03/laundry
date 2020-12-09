<?php
	require 'config.php';

  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	$query="SELECT * FROM dbcucian ORDER BY Id DESC";
	$hasil= mysqli_query($conn,$query);
	$no = 1;
?>


<?php
include_once 'templates/header.php';
?>

<!-- <div class="container mt-3"> 
 -->
	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Data Cucian</h3></center>
		<a href="tambahdatacucian.php" class="btn btn-light mb-1" >Tambah Data</a>
		</div>
	</div>
			

				<table border="1" cellpadding="0" cellspacing="0">
					<thead>
					<tr>
					<th>No</th>
					<th>Aksi</th>
					<th>Kode</th>
					<th>Nama Pelanggan</th>
					<th>Jenis Cucian</th>
					<th>Jumlah KG</th>
					<th>Jumlah Cucian</th>
					<th>Harga/KG</th>
					<th>Total Harga</th>
					<th>Tanggal Terima</th>
					</tr>
					</thead>
				
					<tbody>
				<?php

					while ($data = mysqli_fetch_array($hasil)){
					 ?>
					 <tr>
					 	<td><?php echo $no++; ?></td>
					 	<td>
					 		<a href="edit_cucianbase.php?id=<?php echo $data['Id'];?>" class="badge badge-success ml-1 mt-1">edit</a>
					 		<a href="delete_cucianbase.php?id=<?php echo $data['Id'];?>" class="badge badge-danger ml-1 mt-1" onclick="return confirm('anda yakin hapus?');  ">Hapus</a>
					 	</td>
					 	
					 	<td><?php echo $data['Kode']; ?></td>
					 	<td><?php echo $data['Namapelanggan']; ?></td>
					 	<td><?php echo $data['Jeniscucian']; ?></td>
					 	<td><?php echo $data['Jumlahkg']; ?></td>
					 	<td><?php echo $data['Jumlahcucian']; ?></td>
					 	<td><?php echo $data['Hargakg']; ?></td>
					 	<td><?php echo $data['Totalharga']; ?></td>
					 	<td><?php echo $data['Tglterima']; ?></td>	
					 	
					  </tr>

				<?php
			}
		?>	
			</tbody>
				</table>



 <?php 
include_once 'templates/footer.php';
 ?>