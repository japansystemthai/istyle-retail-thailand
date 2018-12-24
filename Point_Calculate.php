<?php
$conn = mysqli_connect("localhost","root","MySQL@JP75b","project_HBA");
/* Check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 
/*
tenantCd=B026
shopCd=0001
amountTotalInTax=324
amountTotalNoTax=300
detailNum=1
usePoint=0
memberId=0000000136
notItemSalesDiv1=0
ItemCd1=07-901
unitPrice1=300
salesUnitPrice1=300
tax1=24
salesNum1=1
pbDiv1=P
signing=50b98e6a0285fcdac161e3578f3deb7d

http://127.0.0.1:8080/api/Point_Calculate.php?tenantCd=B026&shopCd=0003&amountTotalInTax=324&amountTotalNoTax=300&detailNum=1&usePoint=0&memberId=0000000136&notItemSalesDiv1=0&ItemCd1=07-901&unitPrice1=300&salesUnitPrice1=300&tax1=24&salesNum1=1&pbDiv1=P
*/
?>
<html>
    <head>
    </head>
    <body>
<?php
        $shopCd = mysqli_real_escape_string($conn,$_GET['shopCd']);//shopCd
        $amountTotalInTax=mysqli_real_escape_string($conn,$_GET['amountTotalInTax']);
        $amountTotalNoTax=mysqli_real_escape_string($conn,$_GET['amountTotalNoTax']);
        $detailNum=mysqli_real_escape_string($conn,$_GET['detailNum']); 
        $usePoint=mysqli_real_escape_string($conn,$_GET['usePoint']);   
        $memedit=mysqli_real_escape_string($conn,$_GET['memberId']); //MemberId

        $notItemSalesDiv = array();
        $ItemCd = array();
        $unitPrice = array();
        $salesUnitPrice = array();
        $tax = array();
        $salesNum = array();
        $pbDiv = array();
        //$totalQ = 0;

        for ($i=1; $i <= $detailNum; $i++) {
            $notItemSalesDiv[$i] = mysqli_real_escape_string($conn,$_GET['notItemSalesDiv'.$i]);
            $ItemCd[$i] = mysqli_real_escape_string($conn,$_GET['ItemCd'.$i]);
            $unitPrice[$i] = mysqli_real_escape_string($conn,$_GET['unitPrice'.$i]);
            $salesUnitPrice[$i] = mysqli_real_escape_string($conn,$_GET['salesUnitPrice'.$i]);
            $tax[$i] = mysqli_real_escape_string($conn,$_GET['tax'.$i]);
            $salesNum[$i] = mysqli_real_escape_string($conn,$_GET['salesNum'.$i]);
            $pbDiv[$i] = mysqli_real_escape_string($conn,$_GET['pbDiv'.$i]);
            //$totalQ += $salesNum[$i];
        }
        echo $shopCd."<br>";
        echo "amountTotalInTax".$amountTotalInTax."<br>";
        echo $amountTotalNoTax."<br>";
        echo $detailNum."<br>";
        echo $usePoint."<br>";
        echo $memedit."<br>";
        echo $notItemSalesDiv[1]."<br>";
        echo $ItemCd[1]."<br>";
        echo $unitPrice[1]."<br>";
        echo $salesUnitPrice[1]."<br>";
        echo $tax[1]."<br>";

        for ($i=1; $i <= $detailNum ; $i++) { 
            $strSQL = "SELECT seqNo FROM D_GRANT_POINT WHERE 1 ORDER BY seqNo DESC LIMIT 1";
            $checkSeq = mysqli_query($conn,$strSQL);
            if(mysqli_num_rows($checkSeq)<=0) {
                $SEQ_NO = 1;
            } else {
                $rowSeq = mysqli_fetch_array($checkSeq);
                $SEQ_NO = $rowSeq['seqNo']+1;
            }

        $sqlInsertPoint = "INSERT INTO D_GRANT_POINT VALUES ('$memedit',
        '$amountTotalInTax', 
        NULL,
        '$detailNum',
        '$SEQ_NO',
        '$ItemCd[$i]',
        '$unitPrice[$i]',
        '$salesUnitPrice[$i]',
        '$tax[$i]',
        '$salesNum[$i]',
        '$notItemSalesDiv[$i]',
        '$pbDiv[$i]',
        '0',
        NULL,
        NULL,
        NULL)";
        $pointInsert = mysqli_query($conn,$sqlInsertPoint);
        if ($pointInsert) {
            echo "Success<br>";
        }
        }//close for insert Point
        $sqlRank=mysqli_query($conn,"SELECT POINT_MAGNIFICATION FROM M_POINT P,M_RANK R WHERE P.RANK = R.RANK_CODE AND CST_CODE = '$memedit' ORDER BY CST_CODE");
        $rankRow=mysqli_fetch_array($sqlRank);
        if(mysqli_num_rows($sqlRank)<=0) {
                $rank = 1;
            } else {
                $rank = $rankRow['POINT_MAGNIFICATION'];
            }
                $AmountPoint = (($amountTotalNoTax/100)*$rank)-1;
                echo $AmountPoint."<br>";
        

?>
    </body>
</html>
