<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/login.css">
<title>Railway Booking</title>
</head>
<body>

<div class="modal">

  <form class="modal-content" action="login.php">
    <div class="imgcontainer">
      <img src="Images/trainLogo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <h1>Login</h1>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required class="input1">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" required class="input1">

      <button type="submit" name="submitbutton">Login</button>

      <div class="psw">New user?<a href="register.php"> Register Here</a></div>
    </div>

  </form>
</div>

</body>
</html>

<?php
// define variables and set to empty values
    $name = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $name = test_input($_POST["uname"]);
       $email = test_input($_POST["pwd"]);
    }

    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
?>
