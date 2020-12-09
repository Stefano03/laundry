<?php

require 'config.php';

SESSION_start();
  
  if (!isset($_SESSION["login"])) {
    header("location: login.php");

    exit;
  }
?>

<?php
include_once 'templates/header.php';
?>

<div class="container" style="background-image: url('asset/img/logo.jpg'); background-size: cover; height: 500px; ">
    <h3 class="center">Welcome</h3>
</div>
<?php 
include_once 'templates/footer.php';
 ?>