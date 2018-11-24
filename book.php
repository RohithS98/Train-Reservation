<?php

function check($row,$s1,$s2,$day){
    $stList = explode(',',$row["StationList"]);
    $dayList = explode(',',$row["days"]);
    if(in_array($s1,$stList) && in_array($s2,$stList) && in_array($day,$dayList) && $row["Status"] == "On"){
        return true;
    }
    return false;
}

 $connect = mysqli_connect("localhost", "root", "25285618", "traindb");
 if(!$connect){
     echo "<script type='text/javascript'>alert('Database failed');</script>";
     die('Could not connect: '.mysqli_connect_error());
 }
 $s1 = $_POST["start"];
 $s2 = $_POST["end"];
 $output = '<select id="trains">';
 $sql = "SELECT * FROM train ORDER BY trainno";
 $result = mysqli_query($connect, $sql);

 $rows = mysqli_num_rows($result);
 if($rows > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
          if(!check($row,$s1,$s2)){
              continue;
          }
           $output .= '<option value="'.$row['trainno'].'">'.$row['trainno'].'</option>';
 }
 else
 {

 }
 $output .= '</select></table>
      </div>';
 echo $output;
 ?>
