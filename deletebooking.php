<?php
	$connect = mysqli_connect("localhost", "root", "cs16b026", "traindb");
	$id = $_POST["ticketno"];
	$sql = "UPDATE history SET status='Cancelled' WHERE ticketno='".$id."'";
	if(mysqli_query($connect, $sql))
	{
		echo 'Data Deleted';
	}
 ?>
