<?php
session_start();

 $connect = mysqli_connect("localhost", "root", "25285618", "traindb");
 if(!$connect){
     echo "<script type='text/javascript'>alert('Database failed');</script>";
     die('Could not connect: '.mysqli_connect_error());
 }
 $output = '';
 $d = $_POST["date"];
 $am = $_POST["amount"];
 $train = $_POST["trainno"];
 $username = $_SESSION['user_info'];
 $sql = "SELECT amount FROM userdetails WHERE user = '$username';";
 $sql_result = mysqli_query ($connect, $sql) or die ('request "Could not execute SQL query" '.$sql);
 $nnn = mysqli_num_rows($sql_result);
 $amt = (float)mysqli_fetch_array($sql_result)["amount"];
 if(!$amt){
     echo "<p>No Balance</p>";
 }
 else{
     if($am > $amt){
         echo "<p>Insufficient Balance in Account. Current Balance : $amt</p>";
     }
     else{
         $d2 = explode('/',$d);
         $d1 = $d2[2].$d2[1].$d2[0];
         $sql = "UPDATE userdetails SET amount = amount - $am WHERE user = '$username';";
         mysqli_query($connect, $sql) or die ('request "Could not execute SQL query" '.$sql);
         $tno = mt_rand(10000000000,99999999999);
         $sql = "INSERT into history VALUES('$tno',$d1,'Confirmed','$username','$train',$am);";
         mysqli_query($connect, $sql) or die ('request "Could not execute SQL query" '.$sql);
         echo "<script type='text/javascript'>alert('Ticket Booked successfully! Ticket number : $tno');</script><p>Ticket successfully booked!</p>";
     }
 }
?>
