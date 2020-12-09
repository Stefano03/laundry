<?php 
	include 'config.php';
	
  SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }

	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM dbcucian WHERE Id='$id'")or die(mysqli_error());
	
		if (!$delete) {
			echo "hapus database gagal";
			echo "mysqli_error($delete)";
		}

	header("location:cucianbase.php?pesan=delete");
?>