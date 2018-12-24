<?php
	include("../../connect.php");
	header("Content-Type: application/json", true);
	$id=$_POST['id'];
 	$name_eng=$_POST['name_eng'];
 	$name=$_POST['name'];
 	//$name = mysqli_real_escape_string($conn, $_POST["name"]);
 	$tel=$_POST['tel'];
 	$birth = $_POST['birth'];
 	$gender=$_POST['gender'];
 	$race=$_POST['race'];
 	$address=$_POST['address'];
 	$email=$_POST['email'];
 	$lineId=$_POST['lineId'];
 	$rank=$_POST['rank'];
 	/*$reg_id=$_POST['reg_id'];
 	$reg_ymd=$_POST['reg_ymd'];
 	$reg_time=$_POST['reg_time'];*/
 	$mod_id=$_POST['mod_id'];
 	$mod_ymd=$_POST['mod_ymd'];
 	$mod_time=$_POST['mod_time']; 

  $test =  str_replace('/', '-', $_POST['birth']);
  $birthdate = DateTime::createFromFormat('d/m/Y',$_POST['birth'])->format('Y-m-d');
  
  	$strSQL2 = "SELECT * FROM M_CUSTOMER WHERE CST_CODE != '".$id."' AND TEL_NO = '".$tel."'";
    $objQuery2 = mysqli_query($conn,$strSQL2);
    $checktel = mysqli_num_rows($objQuery2);
   if($checktel > 0)
    {
        echo "Phone Number already exists!";
        exit();
    } else {
 	$sql = "UPDATE `M_CUSTOMER` SET `TEL_NO`='".$tel."',`CST_NAME_EN`='".$name_eng."',`CST_NAME`='".$name."',`DATEOFBIRTH`='".$birthdate."',`GENDER`='".$gender."',`NATIONALITY`='".$race."',`EMAIL`='".$email."',`LINE_ID`='".$lineId."',`ADDRESS`='".$address."',`START_RANK`='".$rank."',`MOD_FLG`='1',`MOD_YMD`='".$mod_ymd."',`MOD_TIME`='".$mod_time."',`MOD_ID`='".$mod_id."' WHERE `CST_CODE`='".$id."'"; 
 		mysqli_query($conn, $sql);
 		echo "success";
 		exit();
 	}


?>