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
  
      <?php include('../../sidebar_customer.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer master maintenance
        <small>การจัดการมาสเตอร์ลูกค้า</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer master</a></li>
        <li class="active">New customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Customer : สร้างมาสเตอร์ลูกค้า</h3>
            </div>
          <!-- form start -->
          <form role="form" action="" method="post">
            <div class="box-body" style="padding:10px 40px 0px 40px;"> 
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label style="color: #dd4b39;">Customer Code: รหัสลูกค้า *</label>
                <input type="number" class="form-control" placeholder="Enter Customer Code" id="cusCode" name="cusCode" required autocomplete="off" maxlength="13" min="0" value="<?php echo isset($_POST["cusCode"]) ? $_POST["cusCode"] : ''; ?>"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
              <!-- phone mask -->
              <div class="form-group">
                <label style="color: #dd4b39;">Telephone Number: เบอร์โทรศัพท์ *</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" id="tel" name="tel" class="form-control" value="<?php echo isset($_POST["tel"]) ? $_POST["tel"] : ''; ?>" autocomplete="off" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              </div>
              
              <div class="form-group">
                <label style="color: #dd4b39;">Customer Name(English): ชื่อลูกค้า(ภาษาอังกฤษ) *</label>
                <input type="text" class="form-control" placeholder="" maxlength="150" id="cusNameEng" name="cusNameEng" required value="<?php echo isset($_POST["cusNameEng"]) ? $_POST["cusNameEng"] : ''; ?>" autocomplete="off">
              </div>

              <div class="form-group">
                <label style="color: #dd4b39;">Customer Name: ชื่อลูกค้า *</label>
                <input type="text" class="form-control" placeholder="" maxlength="150" id="cusName" name="cusName" required value="<?php echo isset($_POST["cusName"]) ? $_POST["cusName"] : ''; ?>" autocomplete="off">
              </div>
            <div class="row">
              <div class="col-xs-4">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label style="color: #dd4b39;">Birthday: วันเดือนปีเกิด *</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" id="birth" name="birth" autocomplete="off" required value="<?php echo isset($_POST["birth"]) ? $_POST["birth"] : ''; ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Gender: เพศ </label>
                  <select class="form-control" id="gender" name="gender">
                    <?php
                      include("../../connect.php");
                      $sqlgender = "select CLASSIFICATION_CODE ,CLASSIFICATION_CODE_EN_NM
                            from M_CLASSIFICATION
                            where CLASSIFICATION_ID = '100'
                            order by CLASSIFICATION_CODE_EN_NM";
                      $resultgender = mysqli_query($conn, $sqlgender);
                      while($rowgender = mysqli_fetch_array($resultgender))
                      {
                    ?>
                    <option value="<?php echo $rowgender['CLASSIFICATION_CODE']?>"><?php echo $rowgender['CLASSIFICATION_CODE_EN_NM']?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Nationality: สัญชาติ</label>
                  <select class="form-control select2" style="" id="race" name="race">
                    <?php
                      $sqlNationality = "select CLASSIFICATION_CODE ,CLASSIFICATION_CODE_EN_NM
                            from M_CLASSIFICATION
                            where CLASSIFICATION_ID = '300'
                            order by CLASSIFICATION_CODE_EN_NM";
                      $resultNationality = mysqli_query($conn, $sqlNationality);
                      while($rowNationality = mysqli_fetch_array($resultNationality))
                      {
                    ?>
                    <option value="<?php echo $rowNationality['CLASSIFICATION_CODE']?>"><?php echo $rowNationality['CLASSIFICATION_CODE_EN_NM']?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div><!-- row -->

              <!-- textarea -->
                <div class="form-group">
                  <label>Address: ที่อยู่</label>
                  <textarea class="form-control" rows="3" placeholder="" maxlength="300" id="address" name="address" autocomplete="off"><?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?></textarea>
                </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>E-mail Address: อีเมล</label>
                  <input type="email" class="form-control" placeholder="" maxlength="50" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" autocomplete="off">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Line ID: บัญชีไลน์</label>
                  <input type="text" class="form-control" placeholder="" maxlength="20" id="lineId" name="lineId" value="<?php echo isset($_POST["lineId"]) ? $_POST["lineId"] : ''; ?>" autocomplete="off">
                </div>
              </div>
              <div class="col-md-6" style="left: 50%; transform: translate(-50%);">
              <div class="form-group">
                <label>Initial setting rank: อันดับเริ่มต้น</label>
                <select class="form-control" style="width: 100%;" id="rank" name="rank">
                  <?php
                      $sqlRank = "select RANK_CODE ,RANK_NAME
                            from M_RANK
                            order by POINT_MAGNIFICATION";
                      $resultRank = mysqli_query($conn, $sqlRank);
                      while($rowRank = mysqli_fetch_array($resultRank))
                      {
                    ?>
                  <option value="<?php echo $rowRank['RANK_CODE']?>"><?php echo $rowRank['RANK_NAME']?></option>
                  <?php
                    }
                    ?>
                </select>
              </div>
              
              </div>

          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="button" onclick="location.href='customer.php';" class="btn btn-default">Cancel</button>
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
   /* $('#birth').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    })*/

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
  if(!isset( $_POST['cusCode'])) {
    return false;
  } else {
    if(trim($_POST["cusCode"]) == "")
    {
        echo "Please input Customer Code!";
        exit(); 
    }
    
    if(!isset( $_POST['tel']) || !preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,9}$/im', $_POST['tel']))
    {
        echo "<script type='text/javascript'>alert('Please input Telephone Number!');</script>";
        exit(); 
    }   

    if(trim($_POST["cusNameEng"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Customer Name (English)!');</script>";
        exit(); 
    } 

    if(trim($_POST["cusName"]) == "")
    {
        echo "<script type='text/javascript'>alert('Please input Customer Name!');</script>";
        exit(); 
    } 

    if(trim($_POST["birth"]) == "" || preg_match_all( "/[0-9]/", $_POST["birth"] ) != 8)
    {   $show = preg_match_all("/[0-9]/", $_POST["birth"]);
        echo "<script type='text/javascript'>alert('Please input Birth date! ".$show."');</script>";
        exit(); 
    } 
    
    $strSQL1 = "SELECT * FROM M_CUSTOMER WHERE CST_CODE = '".trim($_POST['cusCode'])."' ";
    $objQuery = mysqli_query($conn,$strSQL1);
    $checkcus = mysqli_fetch_array($objQuery);

    $strSQL2 = "SELECT * FROM M_CUSTOMER WHERE TEL_NO = '".trim($_POST['tel'])."' ";
    $objQuery2 = mysqli_query($conn,$strSQL2);
    $checktel = mysqli_fetch_array($objQuery2);

    if($checkcus)
    {
        echo "<script type='text/javascript'>alert('Customer Code already exists!');</script>";
    }
    elseif ($checktel) {
        echo "<script type='text/javascript'>alert('Phone Number already exists!');</script>";
    }
    else{   
        date_default_timezone_set("Asia/Bangkok");
        
        //$substr = substr($_POST['cusCode'],2);
        $strSQL = "INSERT INTO M_CUSTOMER VALUES ('".$_POST["cusCode"]."',
        '".strval($_POST["tel"])."', 
        '".$_POST["cusNameEng"]."',
        '".$_POST["cusName"]."',
        '".$_POST['birth']."',
        '".$_POST["gender"]."',
        '".$_POST["race"]."',
        '".$_POST["email"]."',
        '".$_POST["lineId"]."',
        '".$_POST["address"]."',
        '".$_POST["rank"]."',
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
    window.location.href='customer.php';
    </script>");
        
    }
    mysqli_close($conn);
  }
?>