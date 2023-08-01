<?php 
session_start();
$user="";
$user=$_SESSION['user'];

 ?>
<html>
<head>
	<title>I2IT | |Select Exam</title>
	<link rel="icon" href="images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/select_exam.css">
</head>
<body>
<div class="container container-table ">
<div class="row vertical-center-row ">
  <a href="physics_chemistry.php"> <div class="col-sm-5 text-center physics" >PHYSICS & CHEMISTRY</div></a>
                       <div class="col-sm-2"></div>
  <a href="iq.php"> <div class="col-sm-5 text-center  iq" >IQ TEST</div></a>
    </a>
    </div>
</div>








	
</body>
</html>	