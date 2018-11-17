<?php  
	$connect = mysqli_connect("localhost", "root", "", "traindb");
	$sql = "DELETE FROM train WHERE trainno = '".$_POST["Train Number"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>
