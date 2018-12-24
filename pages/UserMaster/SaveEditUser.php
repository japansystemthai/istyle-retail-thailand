<?php
	include("../../connect.php");
	$id=$_POST['id'];
 	$name_eng=$_POST['name_eng'];
 	$name=$_POST['name'];
 	$authority=$_POST['authority'];
 	$mod_id=$_POST['mod_id'];
 	$mod_ymd=$_POST['mod_ymd'];
 	$mod_time=$_POST['mod_time']; 
  if($id)
  {
    $sql = "UPDATE `M_USER` SET `USER_NAME_EN`='".$name_eng."',`USER_NAME`='".$name."',`AUTHORITY`='".$authority."',`MOD_FLG`='1',`MOD_YMD`='".$mod_ymd."',`MOD_TIME`='".$mod_time."',`MOD_ID`='".$mod_id."' WHERE `USER_ID`='".$id."'"; 
    mysqli_query($conn, $sql);
    echo "success";
    exit();
  } else {
 	  echo "fail";
    exit();
 	}


?>