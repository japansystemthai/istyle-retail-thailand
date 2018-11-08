<?php
    include ("../../connect.php");
    //mysql_select_db("mydatabase");
    
  if(isset($_POST['promotionCode'])) {
     date_default_timezone_set("Asia/Bangkok");
    if(trim($_POST["promotionCode"]) == "") {
        echo "Please refresh page because Promotion Code is dissappear!";
        exit(); 
    }
    $strSQL1 = "SELECT * FROM M_PROMOTION_HEAD WHERE PROMOTION_CODE = '".trim($_POST['promotionCode'])."' ";
    $objQuery = mysqli_query($conn,$strSQL1);
    $checkPromotion = mysqli_num_rows($objQuery);
    if($checkPromotion > 0) {
        echo "Promotion Code already exists!";
        exit();
    }

    if(trim($_POST["promotionName"]) == "") {
        echo "Please input Promotion Name!";
        exit(); 
    }

    if (!isset($_POST['Priority']) || $_POST['Priority'] <= 0) {
        echo "Please input Priority!";
        exit(); 
    }

    $strSQL2 = "SELECT * FROM M_PROMOTION_STORE WHERE PRIORITY_NO = '".trim($_POST['Priority'])."' ";
    $objQuery2 = mysqli_query($conn,$strSQL2);
    $checkPriority = mysqli_num_rows($objQuery2);
    if ($checkPriority > 0) {
        echo "Priority already exists! Please change number";
        exit(); 
    }


    if (!isset($_POST['Point'])) {
        echo "Please input Point!";
        exit(); 
    }

    if(empty($_POST['all_product']) && empty($_POST["ProductID"]) && empty($_POST['Category']) && empty($_POST['Maker'])) {
        echo "Please input Category / Maker / ProductID / Checked All Product!";
        exit(); 
    }

    if(!empty($_POST['all_product'])) {
        $strSQL_ProDetail = "INSERT INTO M_PROMOTION_DETAIL VALUES ('".$_POST["promotionCode"]."','".$_POST['all_product']."',NULL,NULL,'".date("Y-m-d")."','".date("H:i:s")."','".$_POST["USER_ID"]."',NULL,NULL,NULL,'0')";
        mysqli_query($conn,$strSQL_ProDetail);
    } elseif(!empty($_POST['Category']) || !empty($_POST['Maker'])) {
        if ($_POST['Category'] == "" && $_POST['Maker'] == "") {
           $strSQL_CheckProduct = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PRODUCT";
        } elseif ($_POST['Category'] == "" && $_POST['Maker'] != "") {
            $strSQL_CheckProduct = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PRODUCT WHERE MAKER_CODE = '".$_POST["Maker"]."'";
        } elseif ($_POST['Category'] != "" && $_POST['Maker'] == "") {
            $strSQL_CheckProduct = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PRODUCT WHERE CATEGORY_CODE = '".$_POST["Category"]."'";
        } else {
            $strSQL_CheckProduct = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PRODUCT WHERE CATEGORY_CODE = '".$_POST["Category"]."' AND MAKER_CODE = '".$_POST["Maker"]."'";
        }
        
        $objQuery_CheckProduct = mysqli_query($conn,$strSQL_CheckProduct);
        $CheckRowProduct = mysqli_num_rows($objQuery_CheckProduct);
        if ($CheckRowProduct > 0) {
            while ($RowQueryProduct = mysqli_fetch_array($objQuery_CheckProduct)) {
                $strSQL_ProDetail = "INSERT INTO M_PROMOTION_DETAIL VALUES ('".$_POST["promotionCode"]."','".$RowQueryProduct['PRODUCT_CODE']."','".$RowQueryProduct['CATEGORY_CODE']."','".$RowQueryProduct['MAKER_CODE']."','".date("Y-m-d")."','".date("H:i:s")."','".$_POST["USER_ID"]."',NULL,NULL,NULL,'0')";
                mysqli_query($conn,$strSQL_ProDetail);
            }        
        } else {
            echo "Don`t have Product matching Category and Maker!";
            exit(); 
        }
    } elseif (!empty($_POST["ProductID"])) {
        foreach($_POST['ProductID'] as  $setProductID)
            {   
                if ($setProductID != "") {
                $strSQL_CheckProduct = "SELECT PRODUCT_CODE, CATEGORY_CODE, MAKER_CODE FROM M_PRODUCT WHERE PRODUCT_CODE = '".$setProductID."'";
                $objQuery_CheckProduct = mysqli_query($conn,$strSQL_CheckProduct);
                $RowQueryProduct = mysqli_fetch_array($objQuery_CheckProduct);
                $strSQL_ProDetail = "INSERT INTO M_PROMOTION_DETAIL VALUES ('".$_POST["promotionCode"]."',
                            '".$setProductID."', 
                            '".$RowQueryProduct['CATEGORY_CODE']."',
                            '".$RowQueryProduct['MAKER_CODE']."',
                            '".date("Y-m-d")."',
                            '".date("H:i:s")."',
                            '".$_POST["USER_ID"]."',
                            NULL,
                            NULL,
                            NULL,
                            '0')";
                mysqli_query($conn,$strSQL_ProDetail); 
                }
            }//close foreach
    } else {
        echo "Error to insert M_PROMOTION_DETAIL";
        exit(); 
    }//close else insert to M_PROMOTION_DETAIL

    if (empty($_POST['Store'])) {
       echo "Please input Store!";
       exit(); 
    } else {
        foreach($_POST['Store'] as $setStore) {
            $strSQL_ProStore = "INSERT INTO M_PROMOTION_STORE VALUES ('".$_POST["promotionCode"]."','".$setStore."','".$_POST['Priority']."','".date("Y-m-d")."','".date("H:i:s")."','".$_POST["USER_ID"]."',NULL,NULL,NULL,'0')";
            mysqli_query($conn,$strSQL_ProStore);
        }//close foreach
    }//close insert M_PROMOTION_STORE

    if (!empty($_POST['all_product'])) {
        $checkproductall = '1';
    } else {
        $checkproductall = '0';
    }
        $strSQL_ProHead = "INSERT INTO M_PROMOTION_HEAD VALUES ('".$_POST["promotionCode"]."','".$_POST["promotionName"]."','".$_POST["start"]."','".$_POST["finish"]."','".$_POST["promotion_type"]."','".$_POST["Point"]."',$checkproductall,'".$_POST["Remark"]."','".date("Y-m-d")."','".date("H:i:s")."','".$_POST["USER_ID"]."',NULL,NULL,NULL,'0')";
        mysqli_query($conn,$strSQL_ProHead);
        echo "Success";
   } else {
        echo "Don`t have promotion Code";
        exit();
   }//close ifelse check productid
    mysqli_close($conn);
?>