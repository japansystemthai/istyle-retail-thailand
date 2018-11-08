<?php //connect db
$id = $_POST["id"];
                    include("../../connect.php");
                    $sql = "select * from  D_TRANS_HEAD 
                            where CST_CODE = '".$id."'
                            order by CST_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    $rows = array();
				while($row = mysqli_fetch_array($result)){
    				$rows[] = array('STORE_CODE' => $row['STORE_CODE'],
      								'BILL_NO' => $row['BILL_NO'],
      								'BILL_TYPE' => $row['BILL_TYPE'],
      								'POS_NO' => $row['POS_NO'],
      								'CST_CODE' => $row['CST_CODE'],
      								'SUB_TOTAL' => $row['SUB_TOTAL'],
      								'TAX' => $row['TAX'],
      								'BILL_AMOUNT' => $row['BILL_AMOUNT'],
      								'REC_POINT' => $row['REC_POINT'],
      								'USE_POINT' => $row['USE_POINT']);
				}
                    
                    echo json_encode($rows);
                  ?>