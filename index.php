<?php
    if ( isset( $_COOKIE[session_name()] ) )
        setcookie( session_name() );
    $_SESSION = array();
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Railway Booking</title>
</head>
<body>

    <div class="h-100" style="margin-top: 5rem">
        <div class="col"> </div>
        <div class="container col-12 col-lg-6" style="width: 100%; text-align: center;"> 
            <h1 class="display-5 jumbotron" style="text-decoration-color: white !important;"> Welcome to Railway Booking Portal! </h1>
            <button class="btn btn-primary col-12" style="margin:0.5rem 0rem" onclick="location.href='/login.php';">Login</button>
            <button class="btn btn-primary col-12" style="margin:0.5rem 0rem"onclick="location.href='/register.php';">Register</button>
            <button class="btn btn-primary col-12"  style="margin:0.5rem 0rem"onclick="location.href='/admin.php';">Admin Login</button>
        </div>
        <div class="col"> </div>
    </div>
</body>
</html>
