<html>
<head>
  <title>I2IT || Results</title>
  <link rel="icon" href="../images/fav.png" type="logo/png">
  <meta name="viewport" content="width=device-width,intial-scale-1">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/result.css">
   <link rel="stylesheet" href="../css/datepicker.css">
        <script src="../js/datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#demo').datepicker({
                    format: "yyyy/mm/dd"
                });  
                 
            
            });
        </script>





  <style type="text/css">
 @media print
    {
      #non-printable { display: none; }

      #printable { 
        border: 1px solid #a9acb2;
        font-size: 25px;
}
#printable_one{
     display: block;
margin-top: -320px;
margin-right: 50px;
}


  </style>
</head>
<body style="background-color: white;">

  <div id="non-printable" class="well " >IQ Results <div class="pull-right"><a href="index.php" ><button class="btn btn-danger "><span class="glyphicon glyphicon-off"></span></button></a></div></div></br></br>



  <form method="post" id="non-printable">

      <div class="col-xs-4 col-xs-offset-3">
     <input  type="text"  class="form-control" id="demo"  name="date" >
           
      </div>
      <div class="col-xs-4">
       <button class="btn btn-success" name="submit">Display Results</button>
       </div>
 
  </form>



</body>
</html>
<?php 
if (isset($_POST['submit'])) {
$date=$_POST['date'];

$con=mysqli_connect("localhost","root","","examination");
$sql="SELECT * FROM iq_result WHERE date='$date' ORDER BY marks DESC   ";
echo "<div class='container'></br><center><img src='../images/IIIT.jpg'> </center></br><div><strong><center>IQ Examination Result - $date</center></strong></div></br>
    </center>
    <table class='table table-hover' id='printable'>
        <thead>
            <tr>
            <th>No.</th>  
            <th>Student</th>
            <th>Marks</th>
            </tr>
          </thead>";
if($result=mysqli_query($con,$sql))
          {
           while ($row=mysqli_fetch_row($result))
                {

echo "<tbody>
      <tr>
      <td> $row[0] </td>
            <td> $row[1] </td>
            <td> $row[2] </td>
            </tr>";
          }
        }
 echo "</tbody>
        </table>
      </center>
      </div>";
  echo "<center><button class='btn btn-Default btn-md'  onclick='window.print()'  id='non-printable'> <span class='glyphicon glyphicon-print'></span>&nbsp;<b style='font-family:Dejavu Serif'>Print As a PDF</b></button></center>";   
        
}
 ?>