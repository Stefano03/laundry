<?php
	require 'config.php';

  
  	if (isset($_POST ['cari'])) {
	$keyword=$_POST ['keyword'];
	$query="SELECT * FROM dbpengerjaan WHERE Kode LIKE '$keyword'";
	$hasil= mysqli_query($conn,$query);
	$no = 1;
	// }else {
	// $query="SELECT * FROM dbpengerjaan ORDER BY Id DESC";
	// $hasil= mysqli_query($conn,$query);
	// $no = 1;
}
?>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/jquery-ui.css">

    <title>Town Laundry</title>
    </head >
  <body style="background-image: url('asset/img/conten.png'); background-size: cover;">
  	 <div class="container col-lg-11" style="background-image: url('asset/img/conten.png'); background-size: cover;">

	<div class="row">
		<div class= "col-lg-7">
			<center><img src="asset/img/logol.jpg" width="80" height="60" class="rounded" ><br><br><h3>SELAMAT DATANG DI
				<br>Status Pengerjaan</h3></center><hr><br>
		<form action="" method="POST">
			<input type="text" name="keyword" size="30" placeholder="Masukkan Kode Anda" autocomplete="off" autofocus="" >
			<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit" name="cari" title="click untuk mencari data dan refresh">cari!</button>
		</form>
		</div>

	</div>

	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			
			<th>Kode</th>
			<th>Nama Pelanggan</th>
			<th>Jenis Cucian</th>
			<th>Status</th>
			<th>Dari Tanggal</th>
		</tr>
		<!-- <?php
			while ($data = mysqli_fetch_array($hasil)){
					 ?> -->
					 <tr>
					 					 	
					 	<td><?php echo $data['Kode']; ?></td>
					 	<th scope="col"><?php echo $data['Namapelanggan']; ?></th>
					 	<td><?php echo $data['Jeniscucian']; ?></td>
					 	<th scope="col"><?php echo $data['Statuspengerjaan']; ?></th>
					 	<td><?php echo $data['Daritanggal']; ?></td>				 	
					  </tr>

		<?php
	}
?>	

	</table>




</div>

<div class="container-fluid footer mt-4" style="background-image: url('asset/img/footers.png'); background-size: cover; height: 100px; ">
	<p align="center"><span>Copyright &copy; Town Laundry <?= date('Y'); ?></span> </p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- <script src="http://localhost/phpmvc/public/js/bootstrap.js"></script> -->
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/script.js"></script>
<script src="asset/js/jquery.js"></script>


</body>
</html>
