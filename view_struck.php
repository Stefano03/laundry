
<html >
<head>
<title>view Nota</title>
<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<h1>LAundry GAul</h1><hr><br>

	<h2>Nota Pembayaran</h2>


<?php
require 'config.php';

  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }
	if(isset($_GET['submit']))

		

		

	// echo ":". $_POST[""]. "<br>";	
	echo "Kode Pembayaran:". $_POST["Kode"]. "<br>";
	echo "Jenis Cucian:". $_POST["Jeniscucian"]. "<br>";
	echo "Nama Pelanggan:". $_POST["Namapelanggan"]. "<br>";
	echo "Tanggal Pengambilan:". $_POST["Tanggalpengambilan"]. "<br>";
	echo "Total Harga:". $_POST["Totalharga"]. "<br>";
	


?>
</body>
<script>
window.print();
</script>
</html>	