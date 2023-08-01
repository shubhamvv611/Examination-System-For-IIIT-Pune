<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    if($image){
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','test') or die('Unable To connect');
    $sql = "insert into photo (image) values(?)";
 
    $stmt = mysqli_prepare($con,$sql);
 
    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);
 
    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly UPloaded';
        $disp="SELECT * FROM photo";
            if($result=mysqli_query($con,$disp))
            {
                while($row=mysqli_fetch_row($result))
                {
echo '<img height="50%" width="25%" src="data:image/jpeg;base64,'.base64_encode($row[1]).' ">' ;
                }
            }
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
<form  method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
</body>
</html>