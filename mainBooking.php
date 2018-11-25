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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="CSS/booking.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div width="100%">
            <button type="button" class="btn btn-primary" id="logoutButton" style="float:right;margin:20px;" onclick="location.href='/index.php';">Logout</button>
            <button type="button" class="btn" id="backButton" style="float:left;margin:20px;" onclick="location.href='/userMain.php';">Back</button>
        </div>
    	<h1> <center> Previous Ticket/Cancellations </center> </h1>
        <div class="container">
            <br />
            <br />
			<br />
			<div class="table-responsive">
				<span id="result"></span>
				<div id="live_data"></div>
			</div>
		</div>
    </body>
</html>
<script>
$(document).ready(function(){
    function fetch_data()
    {
        $.ajax({
            url:"booking_history.php",
            method:"POST",
            success:function(data){
                console.log(data);
				$('#live_data').html(data);
            }
        });
    }
    fetch_data();
    $(document).on('click', '.btn_delete', function(){
        var id=$(this).data("id5");
        var stq = "hello";
        if(confirm("Are you sure you want to Cancel your booking "+id+"?"))
        {
            $.ajax({
                url:"deletebooking.php",
                method:"POST",
                data:{ticketno:id},
                dataType:"text",
                success:function(data){
                    alert(data);
                    fetch_data();
                }
            });
        }
    });
});
</script>
