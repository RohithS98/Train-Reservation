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
                <div class="input-group input-group-lg" style="text-align: center">
                    <div class="col-8"><input class="form-control" type="text" id="name"placeholder="Passanger Name"></div>
                    <div class="col-3"><input class="form-control" type="text" id="age "placeholder="Age"></div>
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
