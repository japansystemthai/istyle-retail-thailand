<?php
	include("../../connect.php");
	$id=$_POST['id'];
 	$oldPassword=$_POST['oldPassword'];
 	$newPassword=$_POST['newPassword'];
 	$confirmPassword=$_POST['confirmPassword'];
 	$mod_id=$_POST['mod_id'];
 	$mod_ymd=$_POST['mod_ymd'];
 	$mod_time=$_POST['mod_time'];

  $checkdataSQL = "SELECT * FROM M_USER WHERE USER_ID = '".$id."' AND PASSWORD = '".md5($oldPassword)."'";
  $checkdataQuery = mysqli_query($conn,$checkdataSQL);
  $checkdata = mysqli_num_rows($checkdataQuery);
  if($checkdata <= 0 || $checkdata > 1 )
  {
    echo "fail";
    exit();
  } else {
    $sql = "UPDATE `M_USER` SET `PASSWORD`='".md5($newPassword)."',`MOD_FLG`='1',`MOD_YMD`='".$mod_ymd."',`MOD_TIME`='".$mod_time."',`MOD_ID`='".$mod_id."' WHERE `USER_ID`='".$id."'"; 
    mysqli_query($conn, $sql);
    echo "success";
    exit();
 	}


?>