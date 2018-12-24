<?php //connect db
if (isset($_POST["id"])) {
  $id = $_POST["id"];
  include("../../connect.php");
  $rows = array();
  $sql = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PROMOTION_DETAIL WHERE PROMOTION_CODE = '".$id."'";
  $result = mysqli_query($conn, $sql);
  $countsteps = mysqli_num_rows($result);
  while($row = mysqli_fetch_array($result)){
    
    if ($row['PRODUCT_CODE'] != "") {
      if ($row['PRODUCT_CODE'] == "All") {
         $rows[] = array('all_product' => $row['PRODUCT_CODE'],
                      'count' => $countsteps
                      );
      }
      $sqlProduct = "SELECT PRODUCT_CODE, PRODUCT_NAME FROM M_PRODUCT WHERE PRODUCT_CODE = '".$row['PRODUCT_CODE']."'";
      $resultProduct = mysqli_query($conn, $sqlProduct);
      while($rowProduct = mysqli_fetch_array($resultProduct)){
        $rows[] = array('PRODUCT_CODE' => $rowProduct['PRODUCT_CODE'],
                      'PRODUCT_NAME' => $rowProduct['PRODUCT_NAME'],
                      'count' => $countsteps
                      );
      }
    } else {
      $rows[] = array(
                     'CATEGORY_CODE' => $row['CATEGORY_CODE'],
                     'MAKER_CODE' => $row['MAKER_CODE'],
                     'count' => $countsteps
                      );
    }
  }   
  echo json_encode($rows);
  mysqli_close($conn);
  exit();
} else {
  echo "error";
  exit();
}

                    
?>