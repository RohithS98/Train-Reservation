<?php
$connect = mysqli_connect("localhost", "root", "passw0rd", "traindb");
$sql = "INSERT INTO train VALUES('".$_POST["trainNumber"]."', '".$_POST["StationList"]."', '".$_POST["Days"]."', '".$_POST["Status"]."')";
if(mysqli_query($connect, $sql))
{
     echo 'Data Inserted';
}
 ?>
