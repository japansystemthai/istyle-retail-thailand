<?php
session_start(); //เปิด session
$ses_userid =$_SESSION['ses_userid'];                                          //สร้าง session สำหรับเก็บค่า ID
$ses_username = $_SESSION['ses_username'];                          //สร้าง session สำหรับเก็บค่า username
//echo "id = $ses_userid and username = $ses_username";
//ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
if($ses_userid <> session_id() || $ses_username == "" || $_SESSION['ses_status'] == ""){
echo "<script type='text/javascript'> window.alert('Please Login to System!'); 
  window.location.href='../../login.php';
  </script>";
}

          //connect db
    include("connect.php");

    $sql = "SELECT * FROM M_USER WHERE USER_ID ='$ses_username' "; //เรียกข้อมูลมาแสดงทั้งหมด
    $result = mysqli_query($conn, $sql);
    $objResult= mysqli_fetch_array($result);
?>
<header class="main-header" >
    <!-- Logo -->
     <a href="../../indexmainmenu.php" class="logo" style="background-color: #FFFFFF;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../dist/img/newlogo.jpg" class="user-image" alt="Logo Image" ></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="../../dist/img/newlogo.jpg" class="oval" alt="Logo Image"></span>
    </a>
    <style>
         .oval {  width: 100px; 
                  height: 55px; 
        }
    </style>     
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
              <img src="../../dist/img/<?php echo $pic ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $objResult["USER_NAME"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/<?php echo $pic ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $objResult["USER_NAME"];?> - <span style="text-transform: capitalize;"><?php echo $_SESSION['ses_status'];?></span>

                  <small>Member since 
                    <?php date_default_timezone_set("Asia/Bangkok");
                          $newDate = date("M. Y", strtotime($objResult["REG_YMD"])); 
                          echo $newDate; 
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Log out</a>
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