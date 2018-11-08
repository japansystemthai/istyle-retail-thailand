<?php //connect db
$id = $_POST["id"];
        include("../../connect.php");
                    $sql = "select RANK_CODE,RANK_NAME,SALES_AMT,POINT_MAGNIFICATION, REMARK,REG_YMD, REG_TIME, REG_ID,MOD_FLG,MOD_YMD,MOD_TIME,MOD_ID,DELETE_FLG 
                           from M_RANK 
                           where RANK_CODE = '".$id."'
                           ORDER BY POINT_MAGNIFICATION DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
//echo "<script type='text/javascript'>alert('$sql');</script>";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo json_encode($row);

                  ?>