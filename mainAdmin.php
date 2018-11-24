<?php
session_start();
    if(!isset($_SESSION['user_info']) || $_SESSION['user_type'] != 'Admin'){

        header('Location: /admin.php');
        echo "<script type='text/javascript'>alert(Please log in first!);</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<h1> <center>Add/Delete/Modify Train Record </center></h1>
        <div width="100%">
            <button type="button" id="logoutButton" style="float:right;-right:20px;" onclick="location.href='/index.php';">Logout</button>
        </div>
        <div width="100%">
            <h2 style="text-align:center;">Train Table</h2>
        </div>
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
            url:"select1.php",
            method:"POST",
            success:function(data){
				$('#live_data').html(data);
            }
        });
    }
    fetch_data();
    $(document).on('click', '#btn_add', function(){
        var trainnum = $('#tno').text();
        var stationlist = $('#stlist').text();
        var days = $('#day').text();
	    var status = $('#Tstatus').val();
        if(trainnum == ''){
            alert("Enter Train number");
            return false;
        }
        if(stationlist == '')
        {
            alert("Enter Station List");
            return false;
        }
        if(days == '')
        {
            alert("Enter Days");
            return false;
        }
	if(status == '')
        {
            alert("Enter Status");
            return false;
        }
        $.ajax({
            url:"insert.php",
            method:"POST",
            data:{trainNumber : trainnum, StationList : stationlist, Days : days, Status : status},
            dataType:"text",
            success:function(data)
            {
                alert(data);
                fetch_data();
            }
        })
    });

	function edit_data(id, text, column_name)
    {
        $.ajax({
            url:"edit.php",
            method:"POST",
            data:{id:id, text:text, column_name:column_name},
            dataType:"text",
            success:function(data){
                alert(data);
				//$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }
        });
    }
    $(document).on('blur', '.TrainNo', function(){
        var id = $(this).data("id1");
        var trainnum = $(this).text();
        edit_data(id, trainnum, "trainno");
    });
    $(document).on('blur', '.StationList', function(){
        var id = $(this).data("id2");
        var stationlist = $(this).text();
        edit_data(id, stationlist, "StationList");
    });
    $(document).on('blur', '.Days', function(){
        var id = $(this).data("id3");
        var days = $(this).text();
        edit_data(id, days, "days");
    });
    $(document).on('blur', '#Tstatus', function(){
        var id = $(this).data("id4");
        var status = $(this).val();
        edit_data(id, status, "status");
    });
    $(document).on('click', '.btn_delete', function(){
        var id=$(this).data("id5");
        var stq = "hello";
        if(confirm("Are you sure you want to delete train "+id+"?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{Trainnum:id},
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
