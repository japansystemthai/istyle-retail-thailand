<?php //connect db
$id = $_POST["id"];
                    include("../../connect.php");
                    $sql = "select D.CST_CODE,D.STORE_CODE,D.BILL_NO,D.BILL_TYPE,D.POS_NO,D.SUB_TOTAL,D.TAX,D.BILL_AMOUNT,
					D.REC_POINT,D.USE_POINT,P.TOTAL_AMOUNT
					        from  D_TRANS_HEAD D,M_POINT P
                            where D.CST_CODE = '".$id."'
							AND D.CST_CODE = P.CST_CODE 
                            order by D.CST_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
              $result = mysqli_query($conn, $sql);
			
             
			     $rows = array();
              
                 while($row = mysqli_fetch_array($result)){
    				$rows[] = array('CST_CODE' => $row['CST_CODE'],
						            'STORE_CODE' => $row['STORE_CODE'],
      								'BILL_NO' => $row['BILL_NO'],
      								'BILL_TYPE' => $row['BILL_TYPE'],
      								'POS_NO' => $row['POS_NO'],
      								'SUB_TOTAL' => $row['SUB_TOTAL'],
      								'TAX' => $row['TAX'],
      								'BILL_AMOUNT' => $row['BILL_AMOUNT'],
		                            'REC_POINT' => $row['REC_POINT'],
      							    'USE_POINT' => $row['USE_POINT']);
					}
					
			  
                 
                echo json_encode($rows);
				  
					
      //echo json_encode($row);
  ?>


	
