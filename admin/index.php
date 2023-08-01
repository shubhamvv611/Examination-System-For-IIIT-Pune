
<html>
<head>
	<title>I2IT | | Login</title>
	<link rel="icon" href="images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	
	<link rel="stylesheet" type="text/css" href="../css/login1.css">

	<script src='../js/jquery.min.js'></script>
	<script src='../js/jquery.validate.min.js'></script>
	<script src='../js/animate.min.css'></script>
	<script src='../js/wow.min.js'></script>
	<script src="../js/login.js"></script>



	
</head>
<body>

	<section class="site-container padding-tb">
		
		<section class="card wow fadeInLeft">
			
			<h3 class="wow fadeInDown" data-wow-delay="0.4s">LogIn</h3></hr>

			<form class="form-inline" role="form" method="post" action="">
			    <div class="form__wrapper wow fadeInDown" data-wow-delay="0.5s">
			        <input type="text" class="form__input" id="email" name="login" required> 
			        <label class="form__label" for="User">
						<span class="form__label-content">Username</span>
					</label>
			     </div>

			      

			    <div class="form__wrapper wow fadeInDown" data-wow-delay="0.6s">
			        <input type="password" class="form__input" id="password"  name="password" required>
			        <label class="form__label" for="password">
						<span class="form__label-content">Password</span>
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



if (isset($_POST['submit'])) {
$Enter=$_POST['login'];
$pwd=$_POST['password'];


if($Enter=="VilasM"  )
	{
  	   if ($pwd="VilasM") 
  	   {
  	   	   header('Location: index1.php');
  	   }
  	   else
  	   {
  	   	echo "<center ><div id='center'> <strong >&times; &nbsp;Wrong Password</strong></div> </center>";
  	   }
	
	}
	else
	{
	echo "<center ><div id='center'> <strong >&times; &nbsp;Wrong UserID</strong></div> </center>";
	}

}






 ?>