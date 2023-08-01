<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
		<style type="text/css">
@font-face {
	font-family: 'Dejavu Serif';
	font-style: normal;
	src:  url('../fonts/DejaVuSerif.ttf') format('truetype');
}
/* Basic Reset */
*,
*:after,
*:before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 62.5%;
}

body {
 font-size: 1.8em;
 line-height: 1.875;
 font-family: Dejavu Serif;
font-weight: 400;
color: #555;
}
.container .jumbotron, .container-fluid .jumbotron {
    			border-radius: 0px;
				}
.jumbotron
{
background-color:inherit;
border-radius: 0px;
box-shadow: 4px 4px 50px gray;
}
</style>
	<script>
	$(document).ready(function(){
 	$("#checkbox").click(function() {
    	var checked_status = this.checked;
    	if (checked_status == true) {
       $("#close").removeAttr("disabled");
    } else {
       $("#close").attr("disabled", "disabled");
    }
});


});
</script>
</head>
<body>
</br>
<div class="container"><div class="jumbotron">Dear&nbsp;<?php echo $_SESSION['user']; ?><hr>

<div class="container">
1. Do Not Press  Backward Arrow Button Once Exam Started.
</br>
2.Answers Must Be Solved In 30 Minutes.
</br>
3.Submit All Answers Within Time Limit.
</br>
4.Your Result  Will be Display After  Examination. 






</div>
<hr>

<center><input type="checkbox" id="checkbox">&nbsp; I have read all the Instructions.</input></br>
<div class="col-lg-12"><a href="select_exam.php"><button class="btn btn-warning " id="close" disabled>Start Exam</button></div></center></br>


</div></div>



</body>
</html>
