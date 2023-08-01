<html>
<head>

	<title>I2IT ||Registred Student</title>
	<link rel="icon" href="../images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/result.css">
	<style type="text/css">
body{
	background-color:white;
}


	</style>
	
</head>
<body>
<div  class="well " >List Of Registred Student <div class="pull-right"><a href="index.php" ><button class="btn btn-danger "><span class="glyphicon glyphicon-off"></span></button></a></div></div></br></br>
<div class="container">

		<table class="table table-hover">
    		<thead>
      			<tr>
      			<th>No.</th>	
        		<th>Name</th>
        		<th>Mobile No</th>
        		<th>Email Id</th>
      			</tr>
    			</thead>
		<?php  
		$con=mysqli_connect("localhost","root","","examination");
		$sql="SELECT * FROM examination ";
		
		if($result=mysqli_query($con,$sql))
         	{
         	 while ($row=mysqli_fetch_row($result))
            		{
		?>
			<tbody>
			<tr>
			<td><?php echo "$row[0]"; ?></td>
        		<td><?php echo "$row[1]"; ?></td>
        		<td><?php echo "$row[2]"; ?></td>
        		<td><?php echo "$row[3]"; ?></td>
      			</tr>
      			<?php 
				}
			}
  			 ?>
 			</tbody>
  			</table>
  			
	</div>



</body>
</html>