<?php
session_start();
	$connect = mysqli_connect("localhost", "root", "passw0rd", "traindb");
	$id = $_POST["ticketno"];
	$username = $_SESSION["user_info"];
	$sql = "SELECT status from history WHERE ticketno='".$id."';";
	$temp = mysqli_query($connect,$sql) or die ('request "Could not execute SQL query" '.$sql);
	$initialStat = mysqli_fetch_array($temp)["status"];
	$sql = "UPDATE history SET status='Cancelled' WHERE ticketno='".$id."';";
	if(mysqli_query($connect, $sql))
	{
		if($initialStat != 'Cancelled'){
			$sql = "SELECT cost from history WHERE ticketno='".$id."';";
			$sql_result = mysqli_query($connect, $sql);
			$amount = mysqli_fetch_array($sql_result)["cost"];
			$sql = "UPDATE userdetails SET amount=amount + $amount WHERE user='".$username."';";
			mysqli_query($connect, $sql);
			echo 'Data Deleted';
		}
		else{
			echo "Cannot cancel an already cancelled ticket";
		}
	}
 ?>
