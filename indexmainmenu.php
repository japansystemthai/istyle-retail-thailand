<?php
session_start(); //เปิด session
$ses_userid =$_SESSION['ses_userid'];                                          //สร้าง session สำหรับเก็บค่า ID
$ses_username = $_SESSION['ses_username'];                          //สร้าง session สำหรับเก็บค่า username
//echo "id = $ses_userid and username = $ses_username";
//ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
if($ses_userid <> session_id() or $ses_username ==""){
echo "<script type='text/javascript'> window.alert('Please Login to System!'); 
  window.location.href='login.php';
  </script>";
exit();
}

          //connect db
    include("connect.php");

    $sql = "SELECT * FROM M_USER WHERE USER_ID ='$ses_username' "; //เรียกข้อมูลมาแสดงทั้งหมด
    $result = mysqli_query($conn, $sql);
    $objResult= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iStyle</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-green">
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
     <a href="indexmainmenu.php" class="logo" style="background-color: #FFFFFF;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="dist/img/istyle50x50.png" class="user-image" alt="Logo Image" ></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="dist/img/newlogo.jpg" class="user-image" alt="Logo Image" style="width:100px; height:55px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php if($_SESSION['ses_status'] == 'Administrator' ) {
                  $pic = "admin.jpg";
                  } elseif ($_SESSION['ses_status'] == "master") {
                $pic = "master.jpg";
          } else { $pic = "general.jpg"; }   ?>    
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/<?php echo $pic ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $objResult["USER_NAME"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/<?php echo $pic ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $objResult["USER_NAME"];?> - <span style="text-transform: capitalize;"><?php echo $_SESSION['ses_status'];?></span>
                  <small>Member since <?php $newDate = date("M. Y", strtotime($objResult["REG_YMD"])); 
                          echo $newDate; 
                    ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
           
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color:#61b876;text-align: center;" >
         <b style="font-size:1.5em;"><?php
          if($_SESSION['ses_status'] == "Administrator" ) {
            echo "ADMIN";
          } elseif ($_SESSION['ses_status'] == "master") {
                echo "MASTER";
          } else { echo "GENERAL"; }  
        ?>&nbsp;&nbsp;&nbsp;MAIN&nbsp;&nbsp;&nbsp;MENU</b> 
          </li>
        <li>
          <a href="pages/CustomerPoint/customerpoint.php"><i class="fa fa-files-o"></i><span >Customer Point Inquiry<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลคะแนนลูกค้า</span></a>
        </li>  
        <?php
          if($_SESSION['ses_status'] == "Administrator" || $_SESSION['ses_status'] == "master") {
        ?>
        <li>
          <a href="pages/CustomerMaster/customer.php"><i class="fa fa-th"></i><span> Customer Master Maintenance<br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ลูกค้า</span></a>
        </li>
        <?php
          }
          if($_SESSION['ses_status'] == "Administrator") {
        ?>
        <li>
          <a href="pages/PromotionMaster/promotion.php"><i class="fa fa-pie-chart"></i><span>Promotion Master Maintenance<br>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์โปรโมชั่น </span></a>
        </li>
        <li>
          <a href="pages/RankMaster/rankmaster.php"><i class="fa fa-table"></i><span>Point Rank Master Maintenance<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ระดับคะแนน
        </span></a>
        </li>
        <li>
          <a href="pages/UserMaster/user.php"><i class="fa fa-user"></i><span>User Master Maintenance<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ผู้ใช้ 
            </span></a>
        </li>  
        <?php
          }
        ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MAIN MENU
        <small>เมนูหลัก</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <br>
        <br>

        <center><img src="dist/img/istyl1240x618.png" class="user-image" alt="LOGO" style="width:50%"></center><br>
        <center><img src="dist/img/cosme_logo.png" class="user-image" alt="LOGO" style="width:70%"></center>

        
          
          
          
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
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
