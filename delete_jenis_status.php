<?php 
	include 'config.php';
	
  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM dbjenisstatus WHERE Id='$id'")or die(mysqli_error());
	
		if (!$delete) {
			echo "hapus database gagal";
			echo "mysqli_error($delete)";
		}

	header("location:jenis_status.php?pesan=delete");
?>