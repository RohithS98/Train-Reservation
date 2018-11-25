<?php
session_start();
function check($row,$s1,$s2,$day){
    $stList = explode(',',$row["StationList"]);
    $dayList = explode(',',$row["days"]);
    if(in_array($s1,$stList) && in_array($s2,$stList) && in_array($day,$dayList) && $row["status"] == "On"){
        return true;
    }
    return false;
}

 $connect = mysqli_connect("localhost", "root", "25285618", "traindb");
 if(!$connect){
     echo "<script type='text/javascript'>alert('Database failed');</script>";
     die('Could not connect: '.mysqli_connect_error());
 }
 $output = '';
 $s1 = $_POST["start"];
 $s2 = $_POST["end"];
 $date = explode('/',$_POST["date"]);
 $dj =gregoriantoJD($date[1],$date[0],$date[2]);
 $day = jddayofweek($dj,2);

 $sql = "SELECT * FROM train ORDER BY trainno";
 $result = mysqli_query($connect, $sql);
 $f = FALSE;
 $rows = mysqli_num_rows($result);
 if($rows > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
          if(!check($row,$s1,$s2,$day)){
              continue;
          }
          else if($f == false){
              $output .= '<h3>Train No</h3>';
              $output .= '<select id="trains">';
          }
          $f = TRUE;
           $output .= '<option value="'.$row['trainno'].'">'.$row['trainno'].'</option>';

       }
       $output .= '</select></table></div>';
  }
 if(!$f){
     $output = '<p>No Trains</p>';
 }

 echo $output;
 ?>
