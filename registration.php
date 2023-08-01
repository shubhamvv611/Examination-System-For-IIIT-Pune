<?php 
session_start();
 ?>
<html>
<head>
	<title>I2IT | | Registration</title>
	<link rel="icon" href="images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	
	<link rel="stylesheet" type="text/css" href="css/registration.css">

	<script src='js/jquery.min.js'></script>
	<script src='js/jquery.validate.min.js'></script>
	<script src='js/animate.min.css'></script>
	<script src='js/wow.min.js'></script>
	<script src="js/login.js"></script>
	<style type="text/css">
#hide
{
	display: none;
}
</style>
<script>
$(document).ready(function(){
    $("#show").ready(function(){
        $("#hide").show(1000);
    
    });
});
</script>
</head>
<body>
</br>
    <center><a href="login.php"><button  class="btn btn-large pull-right" id="hide">LogIn After Registration</button></a></center>


	<section class="site-container padding-tb">
		
		<section class="card wow fadeInLeft">
			
			<h3 class="wow fadeInDown" data-wow-delay="0.4s">Registration Form</h3></hr>

			<form class="form-inline" role="form" method="post" action="" >
			    <div class="form__wrapper wow fadeInDown" data-wow-delay="0.5s">
			        <input type="text" class="form__input" id="email" name="name" required>
			        <label class="form__label" for="email">
						<span class="form__label-content">Name</span>
					</label>
			     </div>

			       <div class="form__wrapper wow fadeInDown" data-wow-delay="0.5s">
			        <input type="text" class="form__input" id="email" name="mobile" required>
			        <label class="form__label" for="email">
						<span class="form__label-content">Mobile No</span>
					</label>
			     </div>

			      <div class="form__wrapper wow fadeInDown" data-wow-delay="0.5s">
			        <input type="email" class="form__input" id="email" name="email" required>
			        <label class="form__label" for="email">
						<span class="form__label-content">Email Id</span>
					</label>
			     </div>

			 

			    <div class="form__wrapper--submit wow fadeInLeft" data-wow-delay="0.7s">
			    	<div class="form__input-submit">
			        	<button type="submit" name="submit" class="btn btn-block" >Submit</button>
			        </div>
			    </div>
			</form>
			

<center><div class="alert alert-info alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Info!</strong>  Password Will Be Send On Your Mobile Number After Successful Registration.
  </div></center>
 
		</section><!-- /card -->

       
		
		</section><!-- /site-container -->


</body>
</html>
<?php  

$randomString = "";
$name="";
$email="";
$mobile="";

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	 $con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"examination");
	mysqli_query($con,"INSERT INTO examination(name,mobile,email) 
VALUES ('$name','$mobile','$email')");
	if ($con!="") {
	        echo"        <center ><div id='show' style=' background-color: rgb(255,255,255);
					border:1px solid white;
					border-radius: 2px;
					height: auto;
					width:50%;
					padding:auto;
					color: green;border-left-width: 4px;
					border-left-color: green;'> <strong >&#10004; &nbsp; Data Successfully Stored ,Wait For OTP</strong></div> </center>";
	



	}

$otp=mt_rand(1000,9999);   //otp generate here 
echo $otp;
$_SESSION['randomString'] = $otp;
$xml_data ="
<parent>
 <child>
 <user>VilasM</user>
<key>7a3ccd32eeXX</key>
<mobile>$mobile</mobile>
<message>Your OTP For I2IT  Online Examination Is : $otp             ---ALL THE BEST---</message>
<accusage>1</accusage>
<senderid>ISQRIT</senderid>
  </child>
  </parent>
";

$URL = "http://mobicomm.dove-sms.com/mobicomm//submitsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);

//print_r($output); //Status OF massage 
}

?>
