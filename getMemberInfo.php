<?php
$conn = mysqli_connect("localhost","root","MySQL@JP75b","project_HBA");
/* Check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 
//echo "Connected successfully";
?>
<?php
    
    if (isset($_GET['memberId']) && isset($_GET['telNo'])) {
        $memedit=mysqli_real_escape_string($conn,$_GET['memberId']); //MemberId
        $telNo=mysqli_real_escape_string($conn,$_GET['telNo']); //TelNo
        
        $memSelect=mysqli_query($conn,"SELECT * FROM M_CUSTOMER WHERE CST_CODE='$memedit' AND TEL_NO='$telNo'");
        
    } elseif (isset($_GET['memberId']) && !isset($_GET['telNo'])) {
        $memedit=mysqli_real_escape_string($conn,$_GET['memberId']); //MemberId
        //$telNo=mysqli_real_escape_string($conn,$_GET['telNo']); //TelNo
        //$shopCd = mysqli_real_escape_string($conn,$_GET['shopCd']);//shopCd
        
        $memSelect=mysqli_query($conn,"SELECT * FROM M_CUSTOMER WHERE CST_CODE='$memedit'");
        
    } elseif (!isset($_GET['memberId']) && isset($_GET['telNo'])) {
        //$memedit=mysqli_real_escape_string($conn,$_GET['memberId']); //MemberId
        $telNo=mysqli_real_escape_string($conn,$_GET['telNo']); //TelNo
        //$shopCd = mysqli_real_escape_string($conn,$_GET['shopCd']);//shopCd
        $memSelect=mysqli_query($conn,"SELECT * FROM M_CUSTOMER WHERE TEL_NO='$telNo'");
        
        
    } else {
        echo "Not Have Data...<br>Please put text for Example...<br><br>";
        exit();
    }
        $memeditrow=mysqli_fetch_array($memSelect); //fetch ตาม customer code
        if(mysqli_num_rows($memSelect) <= 0) {
            echo "Not matching data<br><br>";
            exit();
        }

        $customerID = $memeditrow['CST_CODE'];
        $custTel = $memeditrow['TEL_NO'];
        $custnameEn = $memeditrow['CST_NAME_EN'];
        $custname = $memeditrow['CST_NAME'];
        $custBirth = $memeditrow['DATEOFBIRTH'];
        $custGender = $memeditrow['GENDER'];
        $custNation = $memeditrow['NATIONALITY'];
        $custMail = $memeditrow['EMAIL'];
        $custLineID = $memeditrow['LINE_ID'];
        $custAddress = $memeditrow['ADDRESS'];
        $custRankStart = $memeditrow['START_RANK'];

        $pointSelect = mysqli_query($conn,"SELECT * FROM M_POINT WHERE CST_CODE='$customerID'");
        $pointRow = mysqli_fetch_array($pointSelect);
        
        $pointReMain = $pointRow['REMAIN_POINT'];
        $pointTotalAmount = $pointRow['TOTAL_AMOUNT'];
        $pointRank = $pointRow['RANK'];
        $pointExpY1 = $pointRow['EXP_POINT_Y1'];
        $pointExpY2 = $pointRow['EXP_POINT_Y2'];

        $rankSelect = mysqli_query($conn,"SELECT * FROM M_RANK WHERE RANK_CODE='$pointRank'");
        $rankRow = mysqli_fetch_array($rankSelect);
        $reankShId = $rankRow['RANK_CODE'];
        $reankShName = $rankRow['RANK_NAME'];   

    if (isset($_GET['shopCd'])) {
        $shopCd = mysqli_real_escape_string($conn,$_GET['shopCd']);
        $shopSelect = mysqli_query($conn,"select * from M_STORE where STORE_CODE='$shopCd'");
        $shopRow = mysqli_fetch_array($shopSelect);
        
        $shopShId = $shopRow['STORE_CODE'];
        $shopShName = $shopRow['STORE_NAME'];
        $shopShAddress = $shopRow['ADDRESS'];
        $shopShAddress = $shopRow['TEL'];
    }
        
        $dates = date("Y-m-d h:i");
        $nameFiles = "getMemberInf-".$dates;
      
header("Content-type: text/xml");
header("Content-Disposition: attachment; filename='".$nameFiles.".xml'");

echo "<?xml version='1.0' encoding='utf-8'?>
        <GetMemberInfo>
            <ResultStatus>
                <GetStatus>Success</GetStatus>
            </ResultStatus>
            <Result>
                <Name>$customerID</Name>
                <NameEN>$custnameEn</NameEN>
                <AdmissionShopName/>
                <MemberRankId>$custRankStart</MemberRankId>
                <MemberRankName>$reankShName</MemberRankName>
                <Sex>$custGender</Sex>
                <Birthday>$custBirth</Birthday>
                <Postcode/>
                <PrefName/>
                <City/>
                <Town/>
                <Address>$custAddress</Address>
                <Building/>
                <Tel>$custTel</Tel>   
                <MbTel/>
                <PcMail>$custMail</PcMail>
                <MbMail/>
                <PostcardDmUnnecessaryFlg/>
                <EmailDmUnnecessaryFlg/>                   
                <BlackFlg/>
                <Remarks1/>
                <Remarks2/>
                <Remarks3/>
                <UseUnitPoint>1</UseUnitPoint>                     
                <EffectivePoint>$pointReMain</EffectivePoint> 
                <TempGrantPoint>$pointTotalAmount</TempGrantPoint>           
                <TotalGrantPoint>$pointTotalAmount</TotalGrantPoint>
                <TotalUsePoint>$pointReMain</TotalUsePoint>
                <FirstPurchaseDate/>
            </Result>
        </GetMemberInfo>";   

    ?>
        