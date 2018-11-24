<?php
	$connect = mysqli_connect("localhost", "root", "25285618", "traindb");
	$sql = "DELETE FROM train WHERE trainno = '".$_POST["Trainnum"]."'";
	if(mysqli_query($connect, $sql))
	{
		echo 'Data Deleted';
	}
 ?>
