<?php //connect db
	$id = $_POST["id"];
    include("../../connect.php");
    $sql = "select USER_ID,  USER_NAME_EN, USER_NAME, AUTHORITY, REG_YMD, REG_TIME, REG_ID, MOD_FLG, MOD_YMD,  MOD_TIME, MOD_ID, DELETE_FLG 
            from M_USER
            where USER_ID = '".$id."'
            order by USER_ID";  //เรียกข้อมูลมาแสดงทั้งหมด
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
?>