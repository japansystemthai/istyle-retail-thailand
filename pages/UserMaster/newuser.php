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
</head>
<body class="hold-transition skin-green" style="">
<div class="wrapper">

   <?php include('../../header.php'); 
          
   ?>

      <?php include('../../sidebar_user.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User master maintenance
        <small>การจัดการมาสเตอร์ผู้ใช้</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User master</a></li>
        <li class="active">New user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New User : สร้างมาสเตอร์ผู้ใช้</h3>
            </div>
          <!-- form start -->
          <form role="form" action="" method="post" autocomplete="off">
            <div class="box-body" style="padding:10px 40px 0px 40px;"> 
              

              <div class="form-group">
                <label>ID: รหัสผู้ใช้</label>
                <input type="text" class="form-control" placeholder="" id="Id" name="Id" maxlength="8" required value="<?php echo isset($_POST["Id"]) ? $_POST["Id"] : ''; ?>" > 
              </div>

              <div class="form-group">
                <label>Name(English): ชื่อผู้ใช้ภาษาอังกฤษ</label>
                <input type="text" class="form-control" placeholder="" id="NameEng" name="NameEng" maxlength="50" required value="<?php echo isset($_POST["NameEng"]) ? $_POST["NameEng"] : ''; ?>">
              </div>

              <div class="form-group">
                <label>Name: ชื่อผู้ใช้</label>
                <input type="text" class="form-control" placeholder="" id="Name" name="Name" maxlength="50" required value="<?php echo isset($_POST["Name"]) ? $_POST["Name"] : ''; ?>" >
              </div>

              <div class="form-group">
                <label>Password: รหัสผ่าน</label>
                <input type="password" class="form-control" placeholder="" id="password" name="password" required>
              </div>

              <div class="form-group">
                <label>Confirm Password: ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" placeholder="" id="confirmPassword" name="confirmPassword" required>
              </div>
          
              
              <div class="form-group">
                <label>Authority: สิทธิ์</label>
                <select class="form-control" style="width: 100%;" id="Authority" name="Authority">
                  <?php //connect db
                    include("../../connect.php");
                    $sqlAutho = "select * from M_CLASSIFICATION WHERE CLASSIFICATION_ID = '900' order by CLASSIFICATION_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $resultAutho = mysqli_query($conn, $sqlAutho);
                    while($rowAutho = mysqli_fetch_array($resultAutho))
                    {
                  ?>
                  <option value="<?php echo $rowAutho['CLASSIFICATION_CODE']?>"><?php echo $rowAutho['CLASSIFICATION_CODE_EN_NM']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              

          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="button" onclick="location.href='user.php';" class="btn btn-default">Cancel</button>
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
  if(!isset( $_POST['Id'])) {
  //ไม่ทำอะไรเลย
  } else {
    if(trim($_POST["Id"]) == "")
    {
        echo "Please input ID!";
        exit(); 
    }

    if(trim($_POST["NameEng"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Name English!');</script>";
        exit(); 
    }   
    
    if(trim($_POST["Name"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Name!');</script>";
        exit(); 
    }   

    if(trim($_POST["password"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Password');</script>";
        exit(); 
    } 

    if(trim($_POST["confirmPassword"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Confirm Password!');</script>";
        exit(); 
    }

    if ($_POST["password"] != $_POST["confirmPassword"]) {
       echo "<script type='text/javascript'>alert('Password Not Match!<br>รหัสผ่านไม่เหมือนกัน กรุณากรอกใหมอีกครั้งค่ะ');</script>";
        exit(); 
     } 
    
    $strSQL = "SELECT * FROM M_USER WHERE USER_ID = '".trim($_POST['Id'])."' ";
    $objQuery = mysqli_query($conn,$strSQL);
    $checkUserID = mysqli_fetch_array($objQuery);
    
    if($checkUserID)
    {
        echo "<script type='text/javascript'>alert('User ID already exists!');</script>";
    }
    else{   
        date_default_timezone_set("Asia/Bangkok");
        
        $strSQL = "INSERT INTO M_USER VALUES ('".$_POST["Id"]."',
        '".$_POST["NameEng"]."', 
        '".$_POST["Name"]."',
        '".md5($_POST["password"])."',
        '".$_POST["Authority"]."',
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
    window.location.href='user.php';
    </script>");
        
    }
    mysqli_close($conn);
  }
?>