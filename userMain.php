<?php
session_start();
    if(!isset($_SESSION['user_info']) || $_SESSION['user_type'] != 'User'){
        header('Location: /login.php');
        echo "<script type='text/javascript'>alert(Please log in first!);</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/index.css">
        <title>Railway Booking</title>
    </head>
    <body>
        <p><button onclick="location.href='/index.php';">Book Ticket</button></p>
        <p><button onclick="location.href='/index.php';">Previous Bookings/Cancellations</button></p>
        <p><button onclick="location.href='/index.php';">Logout</button></p>
    </body>
</html>
