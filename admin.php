<?php
session_start();
if (isset($_POST['submitbutton']))
{
	$conn = mysqli_connect("localhost","root","passw0rd","traindb");
	if(!$conn){
		echo "<script type='text/javascript'>alert('Database failed');</script>";
	  	die('Could not connect: '.mysqli_connect_error());
	}
	$username=$_POST['uname'];
	$password=$_POST['pwd'];
	$sql = "SELECT * FROM admindetails WHERE user = '$username' AND psw = '$password';";
	$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
	$user = mysqli_fetch_assoc($sql_result);
	if(!empty($user)){
		$_SESSION['user_info'] = $user['user'];
		$_SESSION['user_type'] = 'Admin';
		$message='Logged in successfully';
		header('Location: /mainAdmin.php');
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else{
		$message = 'Wrong username or password.';
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/login.css">
<script type="text/javascript">
	function validate()	{
		var uname1=document.getElementById("uname");
		var pwd1=document.getElementById("pwd");
		if (uname1.value.length<1)
		{
        	alert("Enter valid username");
			uname.focus();
        	return false;
   		}
   		if(pwd1.value.length< 4)
		{
			alert("Password consists of atleast 4 characters");
			pwd.focus();
			return false;
		}
		return true;
	}
</script>
<title>Railway Booking</title>
</head>
<body>
<div class="modal">

  <form class="modal-content" action="admin.php" onsubmit="return validate()" method="post">
    <div class="imgcontainer">
      <img src="Images/adminLogo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <h1>Admin Login</h1>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" id="uname" required class="input1">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required class="input1">

      <input type="submit" name="submitbutton" class="button" value="Login"/>

	  <div class="lol"><a href="login.php">User Login</a></div>
    </div>

  </form>
</div>

</body>
</html>
