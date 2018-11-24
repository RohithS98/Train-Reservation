<?php
	$connect = mysqli_connect("localhost", "root", "", "testing");
	$id = $_POST["id"];
	$text = $_POST["text"];
	$column_name = $_POST["column_name"];
	$sql = "UPDATE train SET ".$column_name."='".$text."' WHERE trainno='".$id."'";
	if(mysqli_query($connect, $sql))
	{
		echo 'Data Updated';
	}
 ?>
