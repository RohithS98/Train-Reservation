<?php  
$connect = mysqli_connect("localhost", "root", "", "traindb");
$sql = "INSERT INTO train VALUES('".$_POST["Train Number"]."', '".$_POST["Station List"]."', '".$_POST["Days"]."', '".$_POST["Status"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>
