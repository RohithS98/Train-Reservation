<?php
session_start();
 $connect = mysqli_connect("localhost", "root", "25285618", "traindb");
 if(!$connect){
     echo "<script type='text/javascript'>alert('Database failed');</script>";
     die('Could not connect: '.mysqli_connect_error());
 }
 $output = '';
 $username = $_SESSION['user_info'];
 $sql = "SELECT * FROM history WHERE username = '$username' ORDER BY ticketno;";
 $result = mysqli_query($connect, $sql);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="30%">Ticket# </th>
                     <th width="40%">Date </th>
                     <th width="25%">Status </th>
                </tr>';
 $rows = mysqli_num_rows($result);
 if($rows > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td class="TicketNo " data-id1="'.$row["ticketno"].'">'.$row["ticketno"].'</td>
                     <td class="Date " data-id2="'.$row["ticketno"].'" >'.$row["date"].'</td>
		     <td class="Status " data-id4="'.$row["ticketno"].'">'.$row["status"].'</td>
                     <td><button type="button" name="delete_btn" data-id5="'.$row["ticketno"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                </tr>
           ';
      }

 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>
