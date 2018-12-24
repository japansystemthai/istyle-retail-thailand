<?php
//header("Content-Type: application/json", true);
    include ("../../connect.php");
  $CST_CODE = $_POST['CST_CODE'];
  if(isset($CST_CODE)) {
     date_default_timezone_set("Asia/Bangkok");
     $AdjustSelect = $_POST['AdjustSelect'];
     $AdjustPoint = floatval($_POST['AdjustPoint']);
     $reason = $_POST['reason'];
     $userid = $_POST['userid'];

     $sqlNumBill = "SELECT BILL_NO FROM D_TRANS_HEAD WHERE STORE_CODE = 'SYS' ORDER BY BILL_NO DESC LIMIT 1";
     $queryCheckNumBill = mysqli_query($conn,$sqlNumBill);
     if (mysqli_num_rows($queryCheckNumBill) > 0 ) {
        $rowCheckNumBill = mysqli_fetch_array($queryCheckNumBill);
        $BILL_NO = $rowCheckNumBill['BILL_NO'];
        $plusnum = ((int)substr($BILL_NO,9))+1;
        $pluszero = "00000000".strval($plusnum);
        $substr = substr($pluszero,-9);
        $billNo = 'PA'.$substr;
     } else {
        $billNo = 'PA000000001';
     }

     $sqlCheckPoint = "SELECT `REMAIN_POINT`, `EXP_POINT_Y1`, `EXP_POINT_Y2` FROM `M_POINT` WHERE `CST_CODE` = '".$CST_CODE."'";
     $queryCheckPoint = mysqli_query($conn,$sqlCheckPoint);
     $rowCheckPonit = mysqli_fetch_array($queryCheckPoint);
     $REMAIN_POINT = $rowCheckPonit['REMAIN_POINT'];
     $EXP_POINT_Y1 = $rowCheckPonit['EXP_POINT_Y1'];
     $EXP_POINT_Y2 = $rowCheckPonit['EXP_POINT_Y2'];

     if ($AdjustSelect == "Add") {
         $sqlTrans = "INSERT INTO `D_TRANS_HEAD` VALUES ('SYS','$billNo','9','".date("Y-m-d")."','".date("H:i:s")."','0','".$CST_CODE."',0,0,0,0,".$AdjustPoint.",0,'".$reason."','".date("Y-m-d")."','".date("H:i:s")."','".$userid."',NULL,NULL,NULL,NULL,NULL,'','','')";
         $calRemain = $REMAIN_POINT+$AdjustPoint;
         $calYear2 = $EXP_POINT_Y2+$AdjustPoint;
         $sqlUpdatePoint = "UPDATE `M_POINT` SET `REMAIN_POINT`=".$calRemain.",`EXP_POINT_Y2`=".$calYear2.",`MOD_FLG`=1,`MOD_YMD`='".date("Y-m-d")."',`MOD_TIME`='".date("H:i:s")."',`MOD_ID`='".$userid."' WHERE `CST_CODE` = '".$CST_CODE."'";
     }

     if ($AdjustSelect == "Minus") {
         $sqlTrans = "INSERT INTO `D_TRANS_HEAD` VALUES ('SYS','$billNo','9','".date("Y-m-d")."','".date("H:i:s")."','0','".$CST_CODE."',0,0,0,0,0,".$AdjustPoint.",'".$reason."','".date("Y-m-d")."','".date("H:i:s")."','".$userid."',NULL,NULL,NULL,NULL,NULL,'','','')";
         $calRemain = $REMAIN_POINT-$AdjustPoint;
         $calYear1 = $EXP_POINT_Y1-$AdjustPoint;
         if ($calYear1 < 0) {
             $calYear2 = $EXP_POINT_Y2+$calYear1;
             $calYear1 = 0;
         } else {
            $calYear2 = $EXP_POINT_Y2;
         }
         $sqlUpdatePoint = "UPDATE `M_POINT` SET `REMAIN_POINT`=".$calRemain.",`EXP_POINT_Y1`=".$calYear1.",`EXP_POINT_Y2`=".$calYear2.",`MOD_FLG`=1,`MOD_YMD`='".date("Y-m-d")."',`MOD_TIME`='".date("H:i:s")."',`MOD_ID`='".$userid."' WHERE `CST_CODE` = '".$CST_CODE."'";
     }

     $queryTrans = mysqli_query($conn,$sqlTrans) or die(mysqli_error($conn)); 
     $queryUpdatePoint = mysqli_query($conn,$sqlUpdatePoint) or die(mysqli_error($conn));
    if ($queryTrans && $queryUpdatePoint) {
        mysqli_commit($conn);
        echo "Success";
    } else {
        mysqli_rollback($conn);
        echo "Error :". mysqli_error($conn);
    }
    
   } else {
        echo "Don`t have Customer Code";
        exit();
   }//close ifelse check customer id
    mysqli_close($conn);
?>