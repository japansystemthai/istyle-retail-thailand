<!DOCTYPE html>
<html>
<head>
  <?php include('../../head.php'); ?>

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
<body class="hold-transition skin-green" style="">
<div class="wrapper">

   <?php include('../../header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
      <?php include('../../sidebar_rank.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rank Master Maintenance
      <small>เพิ่มข้อมูลจัดลำดับ</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rank master</a></li>
        <li class="active">New Rank</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Rank : สร้างระดับลำดับ</h3>
            </div>
          <!-- form start -->
          <form role="form" action="" method="post">
            <div class="box-body" style="padding:10px 40px 0px 40px;"> 
              <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                <label>RANK CODE: รหัสลำดับ</label>
                   <div class="input-group">
                <input type="text" class="form-control" placeholder="Please enter Rank code" id="RANK_CODE" name="RANK_CODE" required data-msg="Please enter Rank code" maxlength="5"  value="<?php echo isset($_POST["RANK_CODE"]) ? $_POST["RANK_CODE"] : ''; ?>">
                  </div>
              </div>
                         
               <div class="form-group">
                 <label>POINT MAGNIFICATION: อัตราคะแนนที่จะได้รับ（เท่า)</label>
                <input type="text" class="form-control" placeholder="" maxlength="5" id="POINT_MAGNIFICATION" name="POINT_MAGNIFICATION" required value="<?php echo isset($_POST["POINT_MAGNIFICATION"]) ? $_POST["POINT_MAGNIFICATION"] : ''; ?>">
              </div>
               
			  <div class="form-group">
                <label>SALES AMOUNT: มูลค่ายอดขาย</label>
                <input type="text" class="form-control" placeholder="" maxlength="10" id="SALES_AMT" name="SALES_AMT" required value="<?php echo isset($_POST["SALES_AMT"]) ? $_POST["SALES_AMT"] : ''; ?>">
              </div>  
              <div class="form-group">
                 <label>RANK NAME: ชื่อลำดับ</label>
                <input type="text" class="form-control" placeholder="" maxlength="50" id="RANK_NAME" name="RANK_NAME" required value="<?php echo isset($_POST["RANK_NAME"]) ? $_POST["RANK_NAME"] : ''; ?>">
              </div>
                                          
                  
                <div class="form-group">
                 <label>REMARK:หมายเหตุ</label>
                  <textarea class="form-control" rows="3"  maxlength="150" id="REMARK" name="REMARK"><?php echo isset($_POST["REMARK"]) ? $_POST["REMARK"] : ''; ?></textarea>
                </div>  
                  
    
                  
                  
                  
                  </div>
                </div>
          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="button" onclick="location.href='rankmaster.php';" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary pull-right">Register</button>
          </div>
        </form>

        </div><!-- /.box box-info -->
        </div><!--/.col (left) -->
      </div><!-- /.row -->
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
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>    
    
    
    
</body>
</html>
<?php
    include ("../../connect.php");
    //mysql_select_db("mydatabase");
  if(!isset( $_POST['RANK_CODE'])) {
  //ไม่ทำอะไรเลย
  } else {
    if(trim($_POST["RANK_CODE"]) == "")
    {
        echo "Please input Rank Code!";
        exit(); 
    }
    
    if(trim($_POST["POINT_MAGNIFICATION"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Point Magnification!');</script>";
        exit(); 
    } 

    if(trim($_POST["RANK_NAME"]) == "")
    {
      echo "<script type='text/javascript'>alert('Please input Rank Name!');</script>";
      exit(); 
    } 

    
    $strSQL = "SELECT * FROM M_RANK WHERE RANK_CODE = '".trim($_POST['RANK_CODE'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $checkrank = mysqli_fetch_array($objQuery);

    
    if($checkrank)
    {
        echo "<script type='text/javascript'>alert('Rank Code already exists!');</script>";
    }
   
    else{   
        date_default_timezone_set("Asia/Bangkok");
        $substr = substr($_POST['RANK_CODE'],1);
        $strSQL = "INSERT INTO M_RANK VALUES ('".$_POST["RANK_CODE"]."',
        '".$_POST["RANK_NAME"]."',
        '".$_POST["SALES_AMT"]."',
        '".$_POST["POINT_MAGNIFICATION"]."',
        '".$_POST["REMARK"]."',
        '".date("Y-m-d")."',
        '".date("H:i:s")."',
        '".$objResult["USER_ID"]."',
        '0',
        NULL,
        NULL,
        NULL,
        '0')";
        $objQuery = mysqli_query($conn,$strSQL); 
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Inserted');
    window.location.href='rankmaster.php';
    </script>");
        
    }
    mysqli_close($conn);
  }
?>