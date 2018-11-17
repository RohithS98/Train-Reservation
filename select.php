<?php  
 $connect = mysqli_connect("localhost", "root", "", "traindb");  
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
                     <td>'.$row["trainno"].'</td>  
                     <td class="StationList" data-id1="'.$row["trainno"].'" contenteditable>'.$row["StationList"].'</td>  
                     <td class="Days" data-id2="'.$row["trainno"].'" contenteditable>'.$row["Days"].'</td>
		     <td class="Status" data-id2="'.$row["trainno"].'" contenteditable>'.$row["Status"].'</td>
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td class="StationList" data-id1="'.$row["trainno"].'" contenteditable></td>  
                <td class="Days" data-id2="'.$row["trainno"].'" contenteditable></td>
		<td class="Status" data-id2="'.$row["trainno"].'" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td class="StationList" data-id1="'.$row["trainno"].'" contenteditable></td>  
                     			<td class="Days" data-id2="'.$row["trainno"].'" contenteditable></td>
		     			<td class="Status" data-id2="'.$row["trainno"].'" contenteditable></td>
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
