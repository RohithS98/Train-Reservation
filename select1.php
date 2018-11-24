<?php
 $connect = mysqli_connect("localhost", "root", "25285618", "traindb");
 if(!$connect){
     echo "<script type='text/javascript'>alert('Database failed');</script>";
     die('Could not connect: '.mysqli_connect_error());
 }
 $output = '';
 $sql = "SELECT * FROM train ORDER BY trainno";
 $result = mysqli_query($connect, $sql);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="10%">Train#</th>
                     <th width="40%">StationList</th>
                     <th width="40%">Days</th>
                     <th width="10%">Status</th>
                </tr>';
 $rows = mysqli_num_rows($result);
 if($rows > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td class="TrainNo" data-id1="'.$row["trainno"].'" contenteditable>'.$row["trainno"].'</td>
                     <td class="StationList" data-id2="'.$row["trainno"].'" contenteditable>'.$row["StationList"].'</td>
                     <td class="Days" data-id3="'.$row["trainno"].'" contenteditable>'.$row["days"].'</td>
		     <td class="Status" data-id4="'.$row["trainno"].'">';
		     if($row["status"] == "On"){
		     	 $output .= '<select id="Tstatus" data-id4="'.$row["trainno"].'">
  				<option value="On">On</option>
  				<option value="Cancel">Cancel</option>
			 </select>';
		     }
		     else{
		     	$output .= '<select id="Tstatus" data-id4="'.$row["trainno"].'">
  				<option value="Cancel">Cancel</option>
  				<option value="On">On</option>
			 </select>';
		     }
		     $output .= '</td>
                     <td><button type="button" name="delete_btn" data-id5="'.$row["trainno"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                </tr>
           ';
      }
      $output .= '
           <tr>
                <td id="tno" contenteditable></td>
                <td id="stlist" contenteditable></td>
                <td id="day" contenteditable></td>
		<td id="status">On</td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr>
      ';
 }
 else
 {
      $output .= '
          <tr>
               <td id="tno" contenteditable></td>
               <td id="stlist" contenteditable></td>
               <td id="day" contenteditable></td>
               <td id="status">On</td>
               <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
          </tr>
            ';
 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>
