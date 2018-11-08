<?php //connect db
$id = $_POST["id"];
                    include("../../connect.php");
                    $sql = "select CST_CODE,  TEL_NO, CST_NAME_EN, CST_NAME, DATEOFBIRTH, GENDER, NATIONALITY, EMAIL, LINE_ID, ADDRESS, START_RANK,  REG_YMD, REG_TIME, REG_ID, MOD_FLG, MOD_YMD,  MOD_TIME, MOD_ID, DELETE_FLG 
                            from M_CUSTOMER 
                            where CST_CODE = '".$id."'
                            order by CST_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo json_encode($row);
                  ?>