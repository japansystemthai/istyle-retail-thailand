<?php
header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iStyle | Log in</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background: #f5f5f5;height: 80%">
<div class="login-box" >
  
  <div class="login-box-body" style="padding: 40px 30px;">
        <div class="login-logo">
    <img src="dist/img/istyle.png" class="img-rounded" alt="Logo istyle" style="width: 60%">
  </div>
  <!-- /.login-logo -->
  <p class="login-box-msg"></p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" required id="username" name="username" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" required id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: #33b332;
    border-color: #33b332;">Log In<br>เข้าสู่ระบบ</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-4"></div>
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


</body>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</html>
<?php
session_start(); //เปิด seesion เพื่อทำงาน
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
if(!isset( $_POST['username'])) {
  //ไม่ทำอะไรเลย
} else {
  $username = $_POST['username'];//ประกาศซตัวแปรชื่อ username โดยการรับค่ามาจากกล่อง username ที่หน้า Login
  $password = md5($_POST['password']);
  //ประกาศซตัวแปรชื่อ password โดยการรับค่ามาจากกล่อง password ที่หน้า Login
  if($username == "") {                    //ถ้ายังไม่ได้กรอกข้อมูลที่ชื่อผู้ใช้ให้ทำงานดังต่อไปนี้
    echo "<script type='text/javascript'>alert('คุณยังไม่ได้กรอกชื่อผู้ใช้ครับ');</script>";
  } else if($password == "") {        //ถ้ายังไม่ได้กรอกรหัสผ่านให้ทำงานดังต่อไปนี้
    echo "<script type='text/javascript'>alert('คุณยังไม่ได้กรอกรหัสผ่านครับ');</script>";
  } else {                                               //ถ้ากรอกข้อมูลทั้งหมดแล้วให้ทำงานดังนี้
    include("connect.php");           //เรียก function สำหรับติดต่อฐานข้อมูลจากหน้า connect.php ขึ้นมา
    $check_log = mysqli_query($conn,"select * from M_USER where USER_ID ='$username' and PASSWORD ='$password' ");  //ใช้ภาษา SQL ตรวจสอบข้อมูลในฐานข้อมูล
    $num = mysqli_num_rows($check_log);//ให้เอาค่าที่ได้ออกมาประกาศเป็นตัวแปรชื่อ $num
    if($num <=0) {                                                           //ถ้าหากค่าที่ได้ออกมามีค่าต่ำกว่า 1
      echo "<script type='text/javascript'>alert('Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง');</script>";
    } else {
      while ($data = mysqli_fetch_array($check_log) ) {//ถ้าค่ามีมากกว่า 0 ขึ้นไป ให้ดึงข้อมูลออกมาทั้งหมด
        if($data['AUTHORITY']=='9'){                          //ตรวจสอบสถานะของผู้ใช้ว่าเป็น Admin            
          //สร้าง session สำหรับให้ admin นำค่าไปใช้งาน
          $_SESSION['ses_userid'] = session_id();            //สร้าง session สำหรับเก็บค่า ID
          $_SESSION['ses_username'] = $data['USER_ID'];      //สร้าง session สำหรับเก็บค่า Username
          $_SESSION['ses_status'] = "Administrator";                      //สร้าง session สำหรับเก็บค่า สถานะความเป็น Admin\ 
          header("location:indexmainmenu.php");
          //ส่งค่าจากหน้านี้ไปหน้า index_admin.php
        }elseif($data['AUTHORITY']=='2'){                              //ตรวจสอบสถานะของผู้ใช้งานว่าเป็น user
          $_SESSION["ses_userid"] = session_id();                      //สร้าง session สำหรับให้ User นำไปใช้งาน
          $_SESSION['ses_username'] = $data['USER_ID'];
          $_SESSION['ses_status'] = "Manager";
          header("location:indexmainmenu.php");
          //ส่งค่าจากหน้านี้ไปหน้า index_user.php
        }elseif($data['AUTHORITY']=='1'){                              //ตรวจสอบสถานะของผู้ใช้งานว่าเป็น user
          $_SESSION["ses_userid"] = session_id();                      //สร้าง session สำหรับให้ User นำไปใช้งาน
          $_SESSION['ses_username'] = $data['USER_ID'];
          $_SESSION['ses_status'] = "general";
          header("location:indexmainmenu.php");
          //ส่งค่าจากหน้านี้ไปหน้า index_user.php
        }
      }//close while
    } 
  }
}
mysqli_close($conn);
?>