<html>
<head>

	<title>List OF Chemistry questions</title>
	<link rel="icon" href="../images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/result.css">
	
	
</head>
<body>
<div  class="well " >List Of Chemistry Questions <div class="pull-right"><a href="index.php" ><button class="btn btn-danger "><span class="glyphicon glyphicon-off"></span></button></a></div></div></br></br>
<div class="container">
<?php  
		$con=mysqli_connect("localhost","root","","examination");
		$sql="SELECT * FROM chemistry ";
		
		if($result=mysqli_query($con,$sql))
         	{
         	 while ($row=mysqli_fetch_row($result))
            		{
		?>    
		</br>
               <div class='container'>
                  <div class='jumbotron'>
<?php echo "Qid.$row[0]"; ?>&nbsp;<?php echo '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[1]).' ">'; ?><hr>
 <div class='col-lg-offset-1 '>
 <?php echo '1.<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[2]).'">';?></br>
<?php echo  '2.<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[3]).'">';?></br>
<?php echo  '3.<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[4]).'">';?></br>
<?php echo  '4.<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[5]).'">';?></br>
     <?php  echo "Answer = $row[6]"; ?></br>
 <form method="post"><button class="btn btn-danger btn-xs" name="delete" value="<?php echo "$row[0]"; ?>">Delete</button></form>
  	</div>
          </div>
</div>
<?php  
}
}
?>
  </br>
  </br>
</div>
</body>
</html>
<?php  
if (isset($_POST['delete'])) {

$con=mysqli_connect("localhost","root","","examination");
$query = "DELETE FROM chemistry WHERE ID={$_POST['delete']} LIMIT 1";
mysqli_query ($con,$query);
if (mysqli_affected_rows($con)) { 
$message="Selected Question Successfully Deleted || Refresh Page ";
echo "<script type='text/javascript'>alert('$message');</script>";

} 
else 
{ 
$message="Selected Question Not Deleted, Try Again";
echo "<script type='text/javascript'>alert('$message');</script>";

}
}









?>