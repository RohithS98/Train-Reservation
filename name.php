<?php
$connect = mysqli_connect("localhost", "root", "25285618", "traindb");
$number = count($_POST["name"]);
if($number > 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO history VALUES("123",111111,can)";
			mysqli_query($connect, $sql);
		}
	}
	echo "Data Inserted";
}
