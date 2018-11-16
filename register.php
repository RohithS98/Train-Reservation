<?php
session_start();
if (isset($_POST['submitbutton']))
{
	$conn = mysqli_connect("localhost","root","25285618","traindb");
if(!$conn){
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());
}
$Username=$_POST['Username'];
$psw=$_POST['psw'];
$aadhar=$_POST['aadhar'];
$ACNO=$_POST['Account'];
$amount=$_POST['initialamo'];
$sql = "SELECT * FROM userdetails WHERE user = '$Username';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$message='Username already exists';
		}
        else{
            $sql = "INSERT INTO userdetails (user,psw, aadhar, ACNO, amount) VALUES ('$Username', '$psw', '$aadhar', '$ACNO', '$amount');";
            if(mysqli_query($conn, $sql)){
	            $message = "You have been successfully registered";
            }
            else{
	            $message = "Please Try Again";
            }
        }
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="CSS/register.css">
<script type="text/javascript">
	function validate()	{
		var uname1 = document.getElementById("Username");
		var pwd1 = document.getElementById("psw");
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
<body>


<class="modal">

  <form class="modal-content" action="register.php" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Username" name="Username" id="Username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="aadhar"><b>Aadhar Number </b></label>
      <input type="text" placeholder="aadhar" name="aadhar" id="aadhar" required>

      <label for="ACNO"><b>Bank Account Number</b></label>
      <input type="text" placeholder="ACNO" name="Account" id="Account" required>

      <label for="Initial-Amount"><b>Initial Amount</b></label>
      <input type="text" placeholder="Initial Amount" name="initialamo" id="initialamo" required>

      <label>



      <div class="clearfix">

        <button type="submit" class="signupbtn" id="submitbutton" name="submitbutton">Sign Up</button>
      </div>

      <div class="psw">Already Registered?<a href="login.php"> Login Here</a></div>

    </div>
  </form>
</div>

</body>
</html>
