
<html>
<head>
  <title>I2IT | | Start Exam</title>
  <link rel="icon" href="images/fav.png" type="logo/png">
  <meta name="viewport" content="width=device-width,intial-scale-1">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="css/physics_chemistry.css">

</head>
<body id="body">
<nav id="navbar-inverse" class="navbar  navbar-fixed-top" > 
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="col-lg-12">
      <div class="col-lg-6"><a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/IIIT.jpg"></a></div>
     <!--Timer start-->
<?php
session_start();
$timestamp = time();
$diff =1800; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
  $slice = ($timestamp - $_SESSION['ts']);  
  $diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
  $diff = $hld_diff;
  $_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;
?>
<div class="container">
  <div class="row">
<div class="col-lg-6 UserTime" >   
    <strong><div  class="col-lg-1"  style="margin-top:35px; " id="strclock"></div>
      <div  class="col-lg-6" style="float :right;margin-top:17px; background-color: white;word-wrap: break-word;
    box-shadow:2px 4px 50px #888888;border:0.5 solid #9a969a;border-radius:3px;"><?php echo "Welcome <br>".$_SESSION['user']." "; ?></div></strong><!--here is output of clock-->
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
 var hour = <?php echo floor($hours); ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>

function countdown() {
 if(sec <= 0 && min > 0) {
  sec = 59;
  min -= 1;
 }
 else if(min <= 0 && sec <= 0) {
  min = 0;
  sec = 0;
 }
 else {
  sec -= 1;
 }
 
 if(min <= 0 && hour > 0) {
  min = 59;
  hour -= 1;
 }
 
 var pat = /^[0-9]{1}$/;
 sec = (pat.test(sec) == true) ? '0'+sec : sec;
 min = (pat.test(min) == true) ? '0'+min : min;
 hour = (pat.test(hour) == true) ? '0'+hour : hour;
 
 document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;
 setTimeout("countdown()",1000);
 }
 countdown();

setTimeout("location.href = 'End.php';",1800000);//automatically terminate the page 
</script>
 <!--Timer Ended-->
</div>
    </div>
</nav></br></br></br></br>
<!-- header ends here now start body part-->
<center><div class="well" style="font-size:20px; ">IQ Test</div></center>
        <form action="iq_result.php" method="post">
        <?php 
         $con=mysqli_connect("localhost","root","","examination");
          $sql="SELECT Id,question,option1,option2,option3,option4,answer from iq order by rand() limit 30;";
          $count=1;
     
          $i=0;
          $answers=array();
          $_SESSION['trueanswers']=array();
         if($result=mysqli_query($con,$sql))
         {
          while ($row=mysqli_fetch_row($result))
            {
              ?>
               <div class='container'>
                  <div class='jumbotron'>
            <span clas='span'>Q.<?php echo "$count "; ?><strong><code><?php echo  '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[1]).' ">'; ?></code></strong></span><hr>
                  <div class='col-lg-offset-1 '>
                  <input type='hidden' name="data[<?php print $row[0];?>]" value=0 checked ></input></br><!--if user not select option then default value will be select -->
                  <input type='radio' name="data[<?php print $row[0];?>]" value=1 ><?php echo  '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[2]).' ">'; ?></input></br>
                  <input type='radio' name="data[<?php print $row[0];?>]" value=2><?php echo  '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[3]).' ">'; ?></input></br>
                  <input type='radio' name="data[<?php print $row[0];?>]" value=3><?php echo  '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[4]).' ">'; ?></input></br>
                  <input type='radio' name="data[<?php print $row[0];?>]" value=4><?php echo  '<img height="auto" width="auto" src="data:image/jpeg;base64,'.base64_encode($row[5]).' ">'; ?></input></br>
                <?php $answers[$i]=$row['6'];//true answers store in $answers
                  //echo "$answers";
                     $_SESSION['trueanswers'][$i]=$answers[$i] ;
                     $i++;

                ?>
                  </div>
                
               </div>
              </div>
                <?php  
              $count++;
   
            }

           //print_r($_SESSION['trueanswers']);
         }
        
?>
<!--model Box-->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-body">
          <center><p style="font-family:Dejavu Serif">Are You Sure To Submit Answer ?</p></center>
        </div>
        <div class="modal-footer">
          <center>
             <button type="submit" class="btn btn-success" name="submit">Submit&nbsp; <span class="  glyphicon glyphicon-floppy-save"></span></button>
             </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close &nbsp; <span class=" glyphicon glyphicon-remove-sign"></span></button>
        </center>
        </div>
      </div>
      
    </div>
  </div>
<!--Model Box ENd-->
</form>



<button class="btn btn-lg btn-warning center-block" data-toggle="modal" data-target="#myModal">Submit Answers  <span class="glyphicon glyphicon-paste"></span> </button>
</br></br>
</body>
</html>


