<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
	

        <div class="col"></div>
        <div class="container col-6" style="margin: auto auto auto auto; text-align: center">
        
            <button type="button" class="btn btn-primary" style="width: 100%; ">Plan Journey</button>
            <input id="datepicker" width="276" />
    	<script>
        	$('#datepicker').datepicker({
        		format: "dd/mm/yyyy DD",
            		uiLibrary: 'bootstrap4'
        	});
    	</script>

            <div class="input-group input-group-lg row" style="margin: 10 10 0 0 !important;">
                <div class="col-12"><input class="form-control" type="text" id="date" placeholder="Date"></div>
                <div class="col-12"><input class="form-control" type="text" id="from" placeholder="From Station"></div>
                <div class="col-12"><input class="form-control" type="text" id="to" placeholder="To Station"></div>
            </div>
                <hr>
                <div class="form-group">
				<form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
					</div>
				</form>
		</div>
            <hr>
            <br>   
            <button type="button" class="btn btn-success" style="width: 100%;">Pay</button>

            <div class="input-group input-group-lg row" style="margin: 10 10 0 0 !important;">
                    <div class="col-12"><input class="form-control" type="text" id="account" placeholder="Account"></div>
                    <div class="col-12"><input class="form-control" type="text" id="amount" placeholder="Amount"></div>
            </div> 
            
            <hr>
            <button type="button" class="btn btn-primary" style="width: 100%;">Book Ticket</button>

        </div>
        <div class="col"></div>
</body>
</html>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>
