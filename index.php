<?php
    if ( isset( $_COOKIE[session_name()] ) )
        setcookie( session_name(), “”, time()-3600, “/” );
    $_SESSION = array();
    session_destroy();
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/index.css">
    <title>Railway Booking</title>
</head>
<body>
    <p><button onclick="location.href='/login.php';">Login</button></p>
    <p><button onclick="location.href='/register.php';">Register</button></p>
    <p><button onclick="location.href='/admin.php';">Admin Login</button></p>
</body>
</html>
