
            <?php 
			        include '../../connect.php';
              $sqlCode = "select DISTINCT C.CST_CODE, C.TEL_NO,C.CST_NAME_EN, C.CST_NAME, P.REMAIN_POINT
                      from  M_CUSTOMER C, M_POINT P
                      where C.CST_CODE = P.CST_CODE
                      AND (C.CST_CODE LIKE '%".$_POST["CST_CODE"]."%'
                      OR C.TEL_NO LIKE '%".$_POST["CST_CODE"]."%'
                      OR C.CST_NAME_EN LIKE '%".$_POST["CST_CODE"]."%'
                      OR C.CST_NAME LIKE '%".$_POST["CST_CODE"]."%')";
              $resultCode = mysqli_query($conn,$sqlCode);

			      if (mysqli_num_rows($resultCode) > 0){
              while ($row = mysqli_fetch_array($resultCode)) { 
            ?>
              <tr>
				          <td><?php echo $row['CST_CODE'] ?></td>
                  <td><?php echo $row['CST_NAME']?></td>
                  <td><?php echo $row['TEL_NO']?></td>
                  <td><?php echo $row['REMAIN_POINT']?></td>
                  <td>
                    <button type="button" class="btn btn-block btn-success editPoint" data-toggle="modal" data-target="#modal-editPoint" data-dismiss="modal">Adjust Point</button>
                  </td>
              </tr>
              <?php
              }//close while
            } else {
					   echo "Data not matching";
				    }
          ?>

