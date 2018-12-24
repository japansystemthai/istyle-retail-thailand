<?php //connect db
if (isset($_POST["id"])) {
  $id = $_POST["id"];
  include("../../connect.php");
   $rows = array();
  $sql = "SELECT STORE_CODE, PRIORITY_NO FROM M_PROMOTION_STORE WHERE PROMOTION_CODE = '".$id."'";
  $result = mysqli_query($conn, $sql);
  $countsteps = mysqli_num_rows($result);
  while($row = mysqli_fetch_array($result)){
    $rows[] = array('STORE_CODE' => $row['STORE_CODE'],
                      'PRIORITY_NO' => $row['PRIORITY_NO'],
                      'count' => $countsteps
                      );
        }   
  echo json_encode($rows);
  mysqli_close($conn);
  exit();
} else {
  echo "error";
  exit();
}

                    
?>