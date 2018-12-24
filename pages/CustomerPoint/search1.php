<div class="col-md-10" id="nav">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Customer Code<br>รหัสลูกค้า</th>
                 <th>Name<br>ชื่อภาษาไทย</th>
                  <th>Telephone Number<br>เบอร์โทรศัพท์</th>
				  <th>Point<br>คะแนน</th>
                  <th>Rank<br>ระดับ</th>
				   <th>Amount to Rank<br>คะแนนระดับต่อไป</th>
				  <th>Next Rank</th> 
				  <th>Total Amount</th>
				  <th>Expire Point
				   <?php
                     date_default_timezone_set("Asia/Bangkok");
					 echo date('Y', strtotime('+1 year')); ?>
				  </th>
                  <th>Expire Point 
					<?php
					 date_default_timezone_set("Asia/Bangkok");  
                    echo date('Y', strtotime('+2 year'));
					 //'date("Y-m-d", strtotime(date("Y-m-d", strtotime($StaringDate)) ."+1 year"))';
					 ?>
					</th>
              
            </tr>
        </thead>
        <tbody>
            <?php 
			  include '../../connect.php';
               $sql = "select C.CST_CODE, C.TEL_NO,C.CST_NAME_EN,C.CST_NAME,P.REMAIN_POINT,P.RANK, P.EXP_POINT_Y1,P.EXP_POINT_Y2, R.RANK_NAME ,P.TOTAL_AMOUNT,(SELECT R1.SALES_AMT FROM M_POINT P, M_RANK R1
               WHERE C.CST_CODE = P.CST_CODE 
               AND R1.POINT_MAGNIFICATION = (SELECT R2.POINT_MAGNIFICATION+1 FROM M_RANK R2 WHERE R2.RANK_CODE = P.RANK))-P.TOTAL_AMOUNT AS SUM,(SELECT R1.RANK_CODE FROM M_POINT P, M_RANK R1
               WHERE C.CST_CODE = P.CST_CODE 
               AND R1.POINT_MAGNIFICATION = (SELECT R2.POINT_MAGNIFICATION+1 FROM M_RANK R2 WHERE R2.RANK_CODE = P.RANK)) As RANK_CODE
			   from M_CUSTOMER C, M_POINT P, M_RANK R
			   where C.CST_CODE = P.CST_CODE 
			   AND P.RANK = R.RANK_CODE
		       AND C.CST_CODE LIKE '%".$_POST["CST_CODE"]."%'";
			   
			  $result = mysqli_query($conn,$sql);
		       
			  if (mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_array($result)) 
			  { 
               ?>
			  <tr>
				   <td ><a href="#content1" onclick="show('<?php echo $row['CST_CODE'] ?>')"><?php echo $row['CST_CODE'] ?></a></td>
                    <td><?php echo $row['CST_NAME']?></td>
                    <td><?php echo $row['TEL_NO']?></td>
				    <td><?php echo $row['REMAIN_POINT']?></td>
                    <td><?php echo $row['RANK_NAME']?></td>
				    <td><?php echo $row['SUM'] ?></td>
				    <td><?php echo $row['RANK_CODE'] ?></td>
				    <td><?php echo $row['TOTAL_AMOUNT']?></td>
				   <td><?php echo $row['EXP_POINT_Y1']?></td>
                    <td><?php echo $row['EXP_POINT_Y2']?></td>
				  
                  
            </tr>
              <?php
              }
			} else {
				$sql1 = "select C.CST_CODE, C.TEL_NO,C.CST_NAME_EN,C.CST_NAME,P.REMAIN_POINT,P.RANK, P.EXP_POINT_Y1,P.EXP_POINT_Y2, R.RANK_NAME ,P.TOTAL_AMOUNT,(SELECT R1.SALES_AMT FROM M_POINT P, M_RANK R1
               WHERE C.CST_CODE = P.CST_CODE 
               AND R1.POINT_MAGNIFICATION = (SELECT R2.POINT_MAGNIFICATION+1 FROM M_RANK R2 WHERE R2.RANK_CODE = P.RANK))-P.TOTAL_AMOUNT AS SUM,(SELECT R1.RANK_CODE FROM M_POINT P, M_RANK R1
               WHERE C.CST_CODE = P.CST_CODE 
               AND R1.POINT_MAGNIFICATION = (SELECT R2.POINT_MAGNIFICATION+1 FROM M_RANK R2 WHERE R2.RANK_CODE = P.RANK)) As RANK_CODE
			   from M_CUSTOMER C, M_POINT P, M_RANK R
			   where C.CST_CODE = P.CST_CODE 
			   AND P.RANK = R.RANK_CODE
		       AND C.TEL_NO LIKE '%".$_POST["CST_CODE"]."%'";
			  
				$result1 = mysqli_query($conn,$sql1);
			
			  if (mysqli_num_rows($result1) > 0){
              while ($row = mysqli_fetch_array($result1)) 
			  { 
                   
              ?>
			  <tr>
				   <td ><a href="#content1" onclick="show('<?php echo $row['CST_CODE'] ?>')"><?php echo $row['CST_CODE'] ?></a></td>
                  <td><?php echo $row['CST_NAME']?></td>
                    <td><?php echo $row['TEL_NO']?></td>
				    <td><?php echo $row['REMAIN_POINT']?></td>
                    <td><?php echo $row['RANK_NAME']?></td>
				    <td><?php echo $row['SUM'] ?></td>
				    <td><?php echo $row['RANK_CODE'] ?></td>
				    <td><?php echo $row['TOTAL_AMOUNT']?></td>
				   <td><?php echo $row['EXP_POINT_Y1']?></td>
                    <td><?php echo $row['EXP_POINT_Y2']?></td>
                   
            </tr>
			
			
              <?php 
					 }
				} else {
					echo "<script type='text/javascript'>alert('Data not matching');</script>";
				}
			}
             ?>
               
        </tbody>
    </table>
</div>


