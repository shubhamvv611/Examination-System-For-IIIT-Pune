<html>
<head>
	<title>I2IT || Add Questions</title>
	<link rel="icon" href="../images/fav.png" type="logo/png">
	<meta name="viewport" content="width=device-width,intial-scale-1">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/physics_questions.css">
  <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

</head>
<body id="body">
<div class="col-lg-12">
    </br>
<div  class="well " >Add Chemistry Questions Here   <div class="pull-right"><a href="index.php"  ><button class="btn btn-danger "><span class="glyphicon glyphicon-off"></span></button></a></div></div></div></br></br></br></br>

<form method="post" action="" enctype="multipart/form-data">
<div class="container col-lg-*  col-sm-offset-1">
	<div class="panel_back_border" class="panel panel-default" >

            <div class="panel_back" class="panel-heading" style="padding: 5px; font-size: 20px;">Click On save Button After Adding Information</div>

                <div class="panel-body" id="table">
                    <table  class='table'  >
                        <tbody>
                        <tr >
                            <td >Enter Question HERE </td>
                            <td><input type="file"  name="question" required> </td>
                           </tr>
                        <tr>
                            <td>Option 1 :</td>
                         <td><input type="file" name="option1" required></td>
                        </tr>
                        <tr>
                            <td>Option 2 :</td>
                         <td><input type="file" name="option2" required></td>
                        </tr>
                        <tr>
                            <td>Option 3 :</td>
                         <td><input type="file"  name="option3" required></td>
                        </tr>
                        <tr>
                            <td>Option 4 :</td>
                         <td><input type="file"  name="option4" required></td>
                        </tr>
                        <tr>
                            <td>Answer  :</td>
                         <td><select class="form-control" name="answer" required>
                                  <option class="default">Select Correct Answer from list</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  </select>
                                </td>
                        </tr>
                   
                        </tbody>
                        </table>
			</div>
		</div></br>
		<ul class="list-inline ">
                <center><li><button type="submit"  name="submit" class="btn btn-primary next-step">Save and continue</button></li></center>
                        </ul>
	</div>
</form>
</div>


</nav>

</body>
</html>
<?php 
/*
//text //
$question="";
$option1="";
$option2="";
$option3="";
$option4="";
$answer="";


if (isset($_POST['submit'])) 
{
$question=$_POST['question'];
$option1=$_POST['option1'];
$option2=$_POST['option2'];
$option3=$_POST['option3'];
$option4=$_POST['option4'];
$answer=$_POST['answer'];
//echo "$question";
//echo "$option1";
//echo "$option2";
//echo "$option3";
//echo "$option4";
echo "$answer";

 $con=mysqli_connect("localhost","root","");
 mysqli_select_db($con,"examination");
 mysqli_query($con,"INSERT INTO  physics(question,option1,option2,option3,option4,answer) 
VALUES ('$question','$option1','$option2','$option3','$option4','$answer')");
  
  if ($con!="") {
        echo"<center ><div style=' background-color: rgb(255,255,255);
border:1px solid white;
border-radius: 2px;
height: auto;
width:50%;
padding:auto;
color: green;'> <strong >&#10004; &nbsp; Data Successfully Stored </strong></div> </center>";
  }

}*/
//image start
if($_SERVER['REQUEST_METHOD']=='POST'){
    $question=$_FILES['question']['tmp_name'];
    $option1=$_FILES['option1']['tmp_name'];
    $option2=$_FILES['option2']['tmp_name'];
    $option3=$_FILES['option3']['tmp_name'];
    $option4=$_FILES['option4']['tmp_name'];
    $answer=$_POST['answer'];
    if($question && $option1 && $option2 && $option3 && $option4 && $answer){
    $q = file_get_contents($question);
    $op1=file_get_contents($option1);
    $op2=file_get_contents($option2);
    $op3=file_get_contents($option3);
    $op4=file_get_contents($option4);
    $con = mysqli_connect('localhost','root','') or die('Unable To connect');
    mysqli_select_db($con,"examination");
    $sql = "insert into chemistry(question,option1,option2,option3,option4,answer) values(?,?,?,?,?,?)";
 
    $stmt = mysqli_prepare($con,$sql);
 
    mysqli_stmt_bind_param($stmt, "ssssss",$q,$op1,$op2,$op3,$op4,$answer);
    mysqli_stmt_execute($stmt);
 
    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        echo"<center ><div style=' background-color: rgb(255,255,255);
border:1px solid white;
border-radius: 2px;
height: auto;
width:50%;
padding:auto;
color: green;'> <strong >&#10004; &nbsp; Data Successfully Stored </strong></div> </center>";
        }
else
       {
        $msg = 'Could not upload';
       }
}
else
{
    echo " Image Not Selected" ;
}
  
}





 ?>