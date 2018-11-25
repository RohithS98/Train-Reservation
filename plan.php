<?php
session_start();
    if(!isset($_SESSION['user_info']) || $_SESSION['user_type'] != 'User'){
        header('Location: /login.php');
        echo "<script type='text/javascript'>alert(Please log in first!);</script>";
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>


        <div class="col"></div>
        <div width="100%">
            <button type="button" id="logoutButton" style="float:right;margin-right:20px;" onclick="location.href='/index.php';">Logout</button>
            <button type="button" id="backButton" style="float:right;margin-right:20px;" onclick="location.href='/userMain.php';">Back</button>
        </div>
        <div class="container col-6" style="margin: auto auto auto auto; text-align: center">

            <h3 style="width: 100%;text-align:center; ">Plan Journey</h3>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <input id="datepicker" width="276" margin="auto"/>
                	<script>
                    	$('#datepicker').datepicker({
                    		format: "dd/mm/yyyy DD",
                        		uiLibrary: 'bootstrap4'
                    	});
                	</script>
                </div>
            </div>
            <div class="input-group input-group-lg row" style="margin: 10 10 0 0 !important;">
                <div class="col-12"><input class="form-control" type="text" id="from" placeholder="From Station"></div>
                <div class="col-12"><input class="form-control" type="text" id="to" placeholder="To Station"></div>
            </div>
                <hr>
            <div id="trainList"></div>
                <hr>
                <div class="form-group">
    				<form name="add_name" id="add_name">
    					<div class="table-responsive">
    						<table class="table table-bordered" id="dynamic_field">
    							<tr>
    								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                    <td><input type="text" name="age[]" placeholder="Enter your age" class="form-control age_list"/></td>
    								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
    							</tr>
    						</table>
    					</div>
    				</form>
                </div>
            <hr>
            <button type="button" class="btn btn-primary" style="width: 100%;" id="priceButton">Get Price</button>
            <div style="width: 100%;margin-top: 5px;"><h2 id="cost"><h2/></div>
            <hr>
            <br>
            <button type="button" class="btn btn-primary" style="width: 100%;" id="submitButton">Book Ticket</button>
            <div id="ticketStatus"></div>
        </div>
        <div class="col"></div>
</body>
</html>
<script>
$(document).ready(function(){
    var i=1;
    function fetch_data()
    {
        var start = $('#from').val();
        var end = $('#to').val();
        var date = $('#datepicker').val();
        console.log(start,end,date);
        if(start != "" && end != "" && date != ""){
            console.log("Send ajax\n");
            $.ajax({
                url:"trainlist.php",
                method:"POST",
                data:{start : start, end : end, date : date},
                //dataType:"text",
                success:function(data){
                    console.log(data);
    				$('#trainList').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert(textStatus, errorThrown);
                    console.log(jqXHR,textStatus,errorThrown);
                }
            });
        }
    }

    function getPrice(){
        document.getElementById("cost").innerHTML = "Rs " + 100*i;
    }
    $(document).on('blur', '#from', function(){
        fetch_data();
    });
    $(document).on('blur', '#to', function(){
        fetch_data();
    });
    $(document).on('blur', '#datepicker', function(){
        fetch_data();
    });

    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="age[]" placeholder="Enter your age" class="form-control age_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        i--;
    });

    $('#submitButton').click(function(){
        var trno = $('#trains').val();
        var date = $('#datepicker').val();
        console.log(trno,date);
        if(trno != "" && trno != undefined && date != ""){
            $.ajax({
                url:"transaction.php",
                method:"POST",
                data:{ date : date, amount : 100*i, trainno : trno },
                success:function(data)
                {
                    $('#ticketStatus').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert(textStatus, errorThrown);
                    console.log(jqXHR,textStatus,errorThrown);
                }
            });
        }
    });

    $('#priceButton').click(function(){
        getPrice();
    })

});
</script>
