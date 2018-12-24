<?php
	include("../../connect.php");
   $date = date("my");
   $check = "P".$date;
   $strSQL = "SELECT PROMOTION_CODE FROM M_PROMOTION_HEAD WHERE PROMOTION_CODE LIKE '".$check."%' ORDER BY PROMOTION_CODE DESC LIMIT 1";
   $objQuery = mysqli_query($conn,$strSQL);
   $checkpromotion = mysqli_num_rows($objQuery);
   if ($checkpromotion > 0) {
   	$rowPromotion = mysqli_fetch_array($objQuery);
   	
   	$num = $rowPromotion['PROMOTION_CODE'];
   	$plusnum = ((int)substr($num,5))+1;
      $inttostring = "0000".strval($plusnum);
   	$sumprocode = substr($inttostring,-5);
   	$promotionCode = "P".$date.$sumprocode;
   } else {
   	$promotionCode = "P".$date."00001";
   }
?>