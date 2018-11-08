<?php
	include("../../connect.php");
	//header("Content-Type: application/json", true);
	$RANK_CODE = $_POST['RANK_CODE'];
    $RANK_NAME = $_POST['RANK_NAME'];
 	$POINT_MAGNIFICATION = $_POST['POINT_MAGNIFICATION'];
    $SALES_AMT = $_POST['SALES_AMT'];
 	$MOD_ID=$_POST['MOD_ID'];
 	$MOD_YMD=$_POST['MOD_YMD'];
 	$MOD_TIME=$_POST['MOD_TIME'];
    
        $sql = "UPDATE `M_RANK` SET `RANK_NAME`='".$RANK_NAME."',`POINT_MAGNIFICATION`='".$POINT_MAGNIFICATION."',`SALES_AMT`='".$SALES_AMT."',`MOD_FLG`='1',`MOD_YMD`='".$MOD_YMD."',`MOD_TIME`='".$MOD_TIME."',`MOD_ID`='".$MOD_ID."',`DELETE_FLG`='0' WHERE `RANK_CODE`='".$RANK_CODE."'";  //เรียกข้อมูลมาแสดงทั้งหมด
 		mysqli_query($conn, $sql);
 		echo "success";
 		exit();
 


?>

