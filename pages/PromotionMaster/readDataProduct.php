<?php //connect db
header("Content-Type: application/json", true);
$id = $_POST["val"];
include("../../connect.php");
$sql = "select PRODUCT_NAME
        from M_PRODUCT
        where PRODUCT_CODE = '".$id."'
        order by PRODUCT_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo json_encode($row);
?>