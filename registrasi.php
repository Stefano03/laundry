<?php

	session_start();
	
	if (!isset($_SESSION["login"])) {
		header("location: login.php");

		exit;
	}

require 'config.php';

 if (isset($_POST["register"])) {
 	if (registrasi($_POST) > 0 ) {
 		
 	 	echo "<script> 
 	  	alert ('data berhasil ditambahakan')
 	  	</script>";
 	  } else {
 	  	echo mysqli_error($conn);
 		
 		}
 	}
?>



<?php
include_once 'templates/header.php';
?>
<style>
    label{
      display: block;
    }
  </style>
  
	<div class="row">
		<div class= "col-lg-5">
			<center><h3>Registrasi</h3></center>
		</div>
	</div>
	<div class="card">
	 <div class="card-body">

	<form action="" method="POST">
		
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">konfigurasi Password</label>
				<input type="password" name="password2" id="password2">
			</li>
			<br>
			
				<button class="btn btn-success" type="submit" name="register">Register</button>
		
		</ul>
	</form>
</div>
</div>

<?php 
include_once 'templates/footer.php';
 ?>