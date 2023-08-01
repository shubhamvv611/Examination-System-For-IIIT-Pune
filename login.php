<?php 
session_start();
 ?>
<html>
<head>
	<title>I2IT | | Login</title>
	<link rel="icon" href="images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	
	<link rel="stylesheet" type="text/css" href="css/login1.css">

	<script src='js/jquery.min.js'></script>
	<script src='js/jquery.validate.min.js'></script>
	<script src='js/animate.min.css'></script>
	<script src='js/wow.min.js'></script>
	<script src="js/login.js"></script>



	
</head>
<body>
<a href="registration.php"><button  class="btn btn-large pull-right" >Registration Page</button></a></br>
	<section class="site-container padding-tb">
		
		<section class="card wow fadeInLeft">
		
			<h3 class="wow fadeInDown" data-wow-delay="0.4s">LogIn</h3>

			<form class="form-inline" role="form" method="post" action="">
			    <div class="form__wrapper wow fadeInDown" data-wow-delay="0.5s">
			        <input type="email" class="form__input" id="email" name="login" required> 
			        <label class="form__label" for="email">
						<span class="form__label-content">Email</span>
					</label>
			     </div>

			      

			    <div class="form__wrapper wow fadeInDown" data-wow-delay="0.6s">
			        <input type="password" class="form__input" id="password"  name="password" required>
			        <label class="form__label" for="password">
						<span class="form__label-content">OTP</span>
					</label>
			       
			     </div>

			    <div class="form__wrapper--submit wow fadeInLeft" data-wow-delay="0.7s">
			    	<div class="form__input-submit">
			        	<button type="submit" name="submit" class="btn btn-block">Submit</button>
			        </div>
			    </div>
			</form>
			

		</section><!-- /card -->

		
		</section><!-- /site-container -->





</body>
</html>
<?php 

$Enter="";



//OTP STORED IN $VAR_VALUE
$var_value =$_SESSION['randomString'];
//echo $var_value;



if (isset($_POST['submit'])) {
$Enter=$_POST['login'];
$pwd=$_POST['password'];
$_SESSION['user'] =$Enter;
 $con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"examination");

mysqli_query($con,"SELECT email FROM  examination WHERE  email='$Enter'   ");







if( mysqli_affected_rows($con)!=0  )
	{
  	   if ($var_value==$pwd) 
  	   {
  	   	   header('Location: instruction.php');
  	   }
  	   else
  	   {
  	   	echo "<center ><div id='center'> <strong >&times; &nbsp;OTP Not valid</strong></div> </center>";
  	   }
	
	}
	else
	{
	echo "<center ><div id='center'> <strong >&times; &nbsp;UserNotValid , Please Do Registration Before LogIn</strong></div> </center>";
	}

}






 ?>