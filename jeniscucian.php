<?php
	require 'config.php';

  
  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	$query="SELECT * FROM  dbjeniscucian ORDER BY Id DESC";
	$hasil= mysqli_query($conn,$query);
	$no = 1;
?>


<?php
include_once 'templates/header.php';
?>

	<div class="row">
		<div class= "col-lg-5">
			<center><h3> Data Cucian</h3></center>
		<a href="Tambahjeniscucian.php" class="btn btn-light mb-1" >Tambah Data</a>
		</div>
	</div>

	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Aksi</th>
			<th>Kode</th>
			<th>Jenis Cucian</th>
			<th>Harga/KG</th>
		
		</tr>
		<?php
			while ($data = mysqli_fetch_array($hasil)){
					 ?>
					 <tr>
					 	<td><?php echo $no++; ?></td>
					 	<td>
					 		<a href="edit_jeniscucian.php?id=<?php echo $data['Id'];?>" class="badge badge-success ml-1 mt-1">edit</a>
					 		<a href="deletejeniscucian.php?id=<?php echo $data['Id'];?>" onclick="return confirm('anda yakin hapus?');" class="badge badge-danger ml-1 mt-1">Hapus</a>
					 	</td>
					 	
					 	<td><?php echo $data['Kode']; ?></td>
					 	<td><?php echo $data['Jeniscucian']; ?></td>
					 	<td><?php echo $data['Hargakg']; ?></td>					 	
					  </tr>

		<?php
	}
?>	

	</table>


<?php 
include_once 'templates/footer.php';
 ?>