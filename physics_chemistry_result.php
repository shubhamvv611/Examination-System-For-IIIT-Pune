<html>
<head>
  <title>Physics_chemistry ||Result</title>
  <link rel="icon" href="images/fav.png" type="logo/png">
  <meta name="viewport" content="width=device-width,intial-scale-1">
  <script src="js/jquery.min.js"></script>
  <script type="js/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <script>
$(document).ready(function(){
    $("button").click(function(){
        $("div").show(1000);
        $("#end").show(1000);
        $(this).effect( "shake" );
    });
});
</script>
<style type="text/css">
#body
{
  font-family: Dejavu Serif;
}
.jumbotron{
  background-color: inherit;
}
@font-face {
font-family: 'Dejavu Serif';
font-style: normal;

src:  url('../fonts/DejaVuSerif.ttf') format('truetype');
}
.well
{
  background-color: inherit;
  border: 0px ;
}
#Pack
{
padding: 40px;
font-family: Dejavu Serif;
font-size: 1.5em;
box-shadow: 2px 4px 40px gray;
width:400px;
display: none;
 word-wrap: break-word;
}
#circle
{
  background-color:rgba(9,181,68,0.69);
color:white;
font-size: 1.5em;
border-radius: 300px / 100px;
  padding:40px;
 width: auto ;
  height: auto;
}
.btn
{
  font-family: Dejavu Serif;
}
a:hover
{
  text-decoration: none;
}

</style>
</head>
<body>





<?php 
session_start();
$userans=array();
$userans_chem=array();
  $trueans_chem=array();
  $trueans=array();
$final_marks=0;
$final_marks_chem=0;
$userans_math=array();
$trueans_math=array();
$final_marks_math=0;
  $i=0;
  if (isset($_POST['submit'])) {
  
  if(isset($_POST['data'])) {
    foreach($_POST['data'] as $name => $value) {  //question number and users answers are fetched
      
       $userans[$i]=$value;
            $i++;
    }
$i=0;  // reqiure bcz i is global and its value changes due to previous loop
 foreach($_SESSION['trueanswers'] as $name => $value) {  //true answers are fetched
      
        $trueans[$i]=$value;
            $i++;
      
    }
for ($i=0; $i<10; $i++) { 
   if ($userans[$i]==$trueans[$i]) {     /// If condition match users get 1 mark
     $final_marks++;
}

}

}
}
// for chem
  $i=0;
  if (isset($_POST['submit'])) {
  
  if(isset($_POST['data'])) {
    foreach($_POST['data'] as $name => $value) {  //question number and users answers are fetched
      
       $userans_chem[$i]=$value;
            $i++;
    }
$i=0;  // reqiure bcz i is global and its value changes due to previous loop
 foreach($_SESSION['trueanswers_chem'] as $name => $value) {  //true answers are fetched
      
        $trueans_chem[$i]=$value;
            $i++;
      
    }
for ($i=0; $i<10; $i++) { 
   if ($userans_chem[$i]==$trueans_chem[$i]) {     /// If condition match users get 1 mark
     $final_marks_chem++;
}

}

}
}


// for chem upto here

// for math
  $i=0;
  if (isset($_POST['submit'])) {
  
  if(isset($_POST['data'])) {
    foreach($_POST['data'] as $name => $value) {  //question number and users answers are fetched
      
       $userans_math[$i]=$value;
            $i++;
    }
$i=0;  // reqiure bcz i is global and its value changes due to previous loop
 foreach($_SESSION['trueanswers_math'] as $name => $value) {  //true answers are fetched
      
        $trueans_math[$i]=$value;
            $i++;
      
    }
for ($i=0; $i<10; $i++) { 
   if ($userans_math[$i]==$trueans_math[$i]) {     /// If condition match users get 1 mark
     $final_marks_math++;
}

}

}
}

$result=$final_marks + $final_marks_chem+$final_marks_math;

// for math upto here














//print_r($trueans);
echo "</br>";
echo "</br>";
//print_r($userans);
//echo "$final_marks";

   
echo "</br>";


?>

<button class="btn btn-danger center-block" name="submit">Display Result &nbsp;<span class="glyphicon glyphicon-facetime-video"></span></button></br></br>
<div class="well center-block" id="pack" >Dear <?php echo $_SESSION['user'] ; ?> Your Result  </br> <center id="circle"><?php echo" Physics=$final_marks</br> chemistry=$final_marks_chem</br>Math=$final_marks_math</br>";?> <?php echo "Total = $result" ; ?>/30 </center></br><code style="font-size:12px;font-family:Dejavu Serif;color:#8e8a8a;">Developed By Shubham Vilasrao Vyawahare [BEIT] </code></div>
<a href="#.php"> <button id="end" style="display:none" class="btn btn-danger center-block">End Exam&nbsp;&nbsp; <span class="glyphicon glyphicon-remove-sign"></span></button></a>
<form method="post">

</form>
</body>
</html>
<?php
$email=$_SESSION['user'] ;
$marks=$result;
$date=date("Y/m/d");
$con=mysqli_connect("localhost","root","","examination");
$sql="INSERT INTO Physics_chemistry_result(email,marks,date) VALUES('$email','$marks','$date')";
mysqli_query($con,$sql);
session_destroy();
 ?>