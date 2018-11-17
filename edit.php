<?php  
	$connect = mysqli_connect("localhost", "root", "", "traindb");
	$trainno = $_POST["Train Number"];  
	$stationlist = $_POST["Station List"];  
	$days = $_POST["Days"];
	$status = $_POST["Status"];
	$sql = "UPDATE train SET StationList='".$stationlist.", Days='".$days.", Status='".$status."' WHERE trainno='".$trainno."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>
