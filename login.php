<?php
	SESSION_start();
	if (isset($_SESSION["login"] )) {
		header("location: home.php");
		exit; 
	}

   	require 'config.php';


	if (isset($_POST["login"])) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' "); 
		if (mysqli_num_rows($result)=== 1 ) {
			
			$row= mysqli_fetch_assoc($result);
			if ( password_verify($password, $row["password"]) ) {

				//set session
				$_SESSION["login"] = true;

				header("location: home.php?loginsuccess");

				exit;
			}
		}

		$error = true;
			
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>halaman login</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">

</head>
<body style="background-image: url(asset/img/laundrs.jpg); background-size: cover;">

	<div class="container">
		<br>
		<div class="card bg-secondary text-white mb-3" style="max-width: 25rem;">
			<center>
			  <div class="card-header"><h7>Selamat Datang administrator</h7></div>
			  <div class="card-body">
			  </div>
			  <img src="asset/img/key.png" width="100" height="100" class="rounded-circle"></center>



			<div class="alert alert-primary" role="alert">
	  		<?php if (isset($error) ) :?>
			<h6>Password atau Username Salah</h6>
			</p>

			<?php endif; ?>
			</div>

			<form action="" method="POST">
			<ul>	
				<div class="form-group mx-sm-3 mb-2">
				<label for="username">username : </label>
				<input type="text" name="username" id="username" required placeholder="masukkan username" class="form-control">
				</div>
			
			
				<div class="form-group mx-sm-3 mb-2">
				<label for="password">password :</label>
				<input type="password" name="password" id="password" required placeholder="masukka password" class="form-control">
				</div>			
				<button type="submit" name="login" class="btn btn-warning">Login</button>
			</ul>

			</form>
    	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>	
</body>
</html>