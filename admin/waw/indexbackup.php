<?php 
if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
	// echo "<script type='text/javascript'>
	// alert('anda belum login');
	// window.location='login.php';
	// </script>";
	// header('Location: login.php');
	echo '<script type="text/javascript">alert("anda belum login");</script>';
} else {
	
}

include 'inc/set_database.php'; 
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/css/style.css">
	<link rel="stylesheet" type="text/css" href="style/css/hover.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/lifeweb.js"></script>
	<title>Life Web</title>
</head>
<body>

<nav class="navbar otak">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-putih" href="#">Pengenalan Narkoba</a>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 samping">
      <p><a href="#">Profil</a></p>
      <p><a href="#">Settings</a></p>
      <p><a href="#">Logout</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Settings</h1>

      <div class="row text-center">
      	<div class="col-sm-6"><a href="" class="tombol hvr-bounce-to-top">Narkotika</a></div>
      	<div class="col-sm-6"><a href="" class="tombol hvr-bounce-to-top">Quiz</a></div>
      	<div class="col-sm-12"><a href="" class="tombol hvr-bounce-to-top">Pencegahan</a></div>
      </div>

    </div>
    <div class="col-sm-2 samping">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center sepatu">
  <p>Footer Text</p>
</footer>


</body>

</html>