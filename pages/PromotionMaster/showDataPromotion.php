<?php //connect db
if (isset($_POST["id"])) {
  $id = $_POST["id"];
  include("../../connect.php");
  $sql = "SELECT * FROM M_PROMOTION_HEAD WHERE PROMOTION_CODE = '".$id."'";
  $result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);      
  echo json_encode($row);
  mysqli_close($conn);
  exit();
} else {
  echo "error";
  exit();
}

                    
?>