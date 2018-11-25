<?php
session_start();
	$connect = mysqli_connect("localhost", "root", "passw0rd", "traindb");
	if(!$connect){
		echo "<script type='text/javascript'>alert('Database failed');</script>";
	  	die('Could not connect: '.mysqli_connect_error());
	}
	$id = $_POST["id"];
	$text = $_POST["text"];
	$column_name = $_POST["column_name"];
	$sql = "SELECT status from train WHERE trainno='".$id."';";
	$temp = mysqli_query($connect,$sql) or die ('request "Could not execute SQL query" '.$sql);
	$initialStat = mysqli_fetch_array($temp)["status"];
	$sql = "UPDATE train SET ".$column_name."='".$text."' WHERE trainno='".$id."';";
	if(mysqli_query($connect, $sql))
	{
		if($initialStat == "On" && $column_name == "status" && $text == "Cancel"){
			$sql = "SELECT * from history where trainno = '$id';";
			$res = mysqli_query($connect,$sql) or die ('request "Could not execute SQL query" '.$sql);
			$n = mysqli_num_rows($res);
			if($n > 0){
				while($row = mysqli_fetch_array($res)){
					$sql = "UPDATE history SET status='Cancelled' WHERE ticketno='".$row["ticketno"]."';";
					mysqli_query($connect,$sql) or die ('request "Could not execute SQL query" '.$sql);
					$sql = "UPDATE userdetails SET amount = amount + ".$row["cost"]." WHERE user='".$row["username"]."';";
					mysqli_query($connect,$sql) or die ('request "Could not execute SQL query" '.$sql);
				}
			}
		}
		echo 'Data Updated';
	}
 ?>