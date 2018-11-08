<!DOCTYPE html>
<html>
<head>

  <?php include('../../head.php'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
   <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

 
</head>
<body class="hold-transition skin-green" style="min-height: 100%">
<div class="wrapper">
  <?php include('../../header_general.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../../sidebar_customerpoint.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Point Inquiry
        <small>ข้อมูลคะแนนลูกค้า</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Customer Point Inquiry</a></li>
        <li class="active">Data customer</li>
      </ol>
    </section>

    <!-- Main content -->
   <section class="content" style="">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="nav">
              <form name="form1" method="post" action="" >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code:รหัสลูกค้า</th>
                 <th>Name : ชื่อภาษาไทย</th>
                  <th>Mobile :โทรศัพท์</th>
                  <th>Rank:ระดับ</th>
                  <th>Point:คะแนน</th>
				  <th>Expire Point Y1</th>
                  <th>Expire Point Y2</th>
                </tr>
                </thead>
                <tbody>
                
                  <?php //connect db
                    include("../../connect.php");
                    $sql = "select C.CST_CODE,  C.TEL_NO, C.CST_NAME_EN, C.CST_NAME,C.ADDRESS, P.RANK, P.REMAIN_POINT, P.EXP_POINT_Y1, P.EXP_POINT_Y2
                      from M_CUSTOMER C, M_POINT P
                      where C.CST_CODE = P.CST_CODE";  
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <tr>
					<td ><a href="#content1" onclick="show('<?php echo $row['CST_CODE'] ?>')"><?php echo $row['CST_CODE'] ?></a></td>
                    <td><?php echo $row['CST_NAME']?></td>
                    <td><?php echo $row['TEL_NO']?></td>
                    <td><?php echo $row['RANK']?></td>
                    <td><?php echo $row['REMAIN_POINT']?></td>
                    <td><?php echo $row['EXP_POINT_Y1']?></td>
                    <td><?php echo $row['EXP_POINT_Y2']?></td>
                  </tr>
                  <?php
                    }
                    ?>
                
                
                </tbody>
                
              </table>
           </form>
				
			
				
		</div>
            <!-- /.box-body -->
			 <div class="box-body ex" id="content1" style="display:none" >
              <table id="showdetail" name="showdetail" class="table table-bordered table-striped-1">
             <thead>
                <tr>
				  <th>Customer code:<br>รหัสลูกค้า</th>
                  <th>Store code:<br>รหัสสาขา</th>
                  <th>Bill number :<br>รหัสบิล</th>
                  <th>Bill type :<br>ประเภทบิล</th>
                  <th>Pos No:<br>ระดับ</th>
                   <th>Sub total<br>ราคารวม</th>
                  <th>Tax<br>ภาษี</th>
				  <th>Amount :<br>ราคารวม</th>
				  <th>Receive point:<br>คะแนนที่ได้รับ</th>
				  <th>Use point:<br>คะแนนที่ใช้</th>
                </tr>
              </thead>
              <tbody id="tbodyshowdetail">
               
                
                
              </tbody>
                
              </table>

				
		</div>	
              
       </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">HBA</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('../../jquery_customer.php'); ?>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
	</script>	


<script type="text/javascript">
function show(value) {
 $(document).ready(function() {
  var val = value;
    $.ajax({
            type: "POST",
            url: 'ShowCustomerPoint.php',
            dataType: 'JSON',
            data: {id: val},
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("No data Matching: " + data);
                $("#content1").hide();
                $("#tbodyshowdetail").empty('');
              } else{  
                $("#content1").show();
                $("#tbodyshowdetail").empty('');
                for (var i = 0; i < data.length; i++) {
                  $("#showdetail").append("<tr><td>" + data[i].CST_CODE + "</td><td>" + data[i].STORE_CODE + "</td><td>" + data[i].BILL_NO + "</td><td>" + data[i].BILL_TYPE + "</td><td>" + data[i].POS_NO + "</td><td>" + data[i].SUB_TOTAL + "</td><td>" + data[i].TAX + "</td><td>" + data[i].BILL_AMOUNT + "</td><td>" + data[i].REC_POINT + "</td><td>" + data[i].USE_POINT + "</td></tr>");
                }

                 
              }  
            }
        });
 });

}
	
</script>
	


</body>
</html>
