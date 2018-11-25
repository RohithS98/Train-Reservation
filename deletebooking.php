<?php
session_start();
	$connect = mysqli_connect("localhost", "root", "25285618", "traindb");
	$id = $_POST["ticketno"];
	$username = $_SESSION["user_info"];
	$sql = "UPDATE history SET status='Cancelled' WHERE ticketno='".$id."';";
	if(mysqli_query($connect, $sql))
	{
		$sql = "SELECT cost from history WHERE ticketno='".$id."';";
		$sql_result = mysqli_query($connect, $sql);
		$amount = mysqli_fetch_array($sql_result)["cost"];
		$sql = "UPDATE userdetails SET amount=amount + $amount WHERE user='".$username."';";
		mysqli_query($connect, $sql);
		echo 'Data Deleted';
	}
 ?>
