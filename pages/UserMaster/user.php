<!DOCTYPE html>
<html>
<head>
  <?php include('../../head.php'); ?>
    <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
<body class="hold-transition skin-green" style="min-height: 100%">
<div class="wrapper">
  <?php include('../../header.php'); 
        if($_SESSION['ses_status'] == "Manager") {
          echo "<script type='text/javascript'> window.alert('Can not use this page!'); 
                window.location.href='javascript:history.go(-1)';
                </script>";
          }?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../../sidebar_user.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User master maintenance
        <small>การจัดการมาสเตอร์ผู้ใช้</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User master</a></li>
        <li class="active">Data user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="newuser.php" class="btn btn-block btn-primary">Create new user<br>เพิ่มผู้ใช้ใหม่</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID <br>  รหัสผู้ใช้</th>
                  <th>Name(English) <br>  ชื่อผู้ใช้(ภาษาอังกฤษ)</th>
                  <th>Name <br>  ชื่อผู้ใช้</th>
                  <th>Authority <br>  สิทธิ์</th>
                  <th>Delete <br>  ลบ</th>
                  <th>Edit <br> แก้ไข</th>
                </tr>
                </thead>
                <tbody>
                
                  <?php //connect db
                    include("../../connect.php");
                    $sql = "select *,CASE
                            WHEN AUTHORITY = '9' THEN 'Administrator'
                            WHEN AUTHORITY = '2' THEN 'Manager'
                            ELSE 'General' END AS AUTHORITY from M_USER WHERE DELETE_FLG = '0' order by USER_ID";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <tr>
                    <td><?php echo $row['USER_ID']?></td>
                    <td><?php echo $row['USER_NAME_EN']?></td>
                    <td><?php echo $row['USER_NAME']?></td>
                    <td><?php echo $row['AUTHORITY']?></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['USER_ID']?>"></td>
                    <td><?php echo "<a class='edituser btn btn-block btn-success btn-sm' data-id='".$row['USER_ID']."' data-userid='".$objResult["USER_ID"]."' role='button' data-toggle='modal' data-target='#modal-edituser' data-dismiss='modal' id='edituser' name='edituser'>Edit</a>"; ?></td>
                  </tr>
                  <?php
                    }
                  ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>ID <br>  รหัสผู้ใช้</th>
                  <th>Name(English) <br>  ชื่อผู้ใช้(ภาษาอังกฤษ)</th>
                  <th>Name <br>  ชื่อผู้ใช้</th>
                  <th>Authority <br>  สิทธิ์</th>
                  <th>Delete <br>  ลบ</th>
                  <th>Edit <br> แก้ไข</th>
                </tr>
                </tfoot>
              </table>
              <input class="btn btn-block btn-danger btn-flat" name="Delete" type="submit" id="Delete" value="Delete" style="width: 30%;display: block;margin-right: auto;margin-left: auto;" onclick="return confirm('Are you sure you want to delete that?');">
               <?php
                // Check if delete button active, start this 
                if(isset($_POST['Delete']))
                {   
                  echo "<script type='text/javascript'>alert('aaaaa');</script>";
                    $checkbox = $_POST['checkbox'];
                    date_default_timezone_set("Asia/Bangkok");
                  for($i=0;$i<count($checkbox);$i++){

                    $del_id = $checkbox[$i];
                    $sql = "UPDATE M_USER SET MOD_YMD = '".date("Y-m-d")."', MOD_TIME = '".date("H:i:s")."',MOD_ID = '".$objResult["USER_ID"]."',DELETE_FLG = '1' WHERE USER_ID = '$del_id'";
                    $result = mysqli_query($conn,$sql);
                  }
                  // if successful redirect to delete_multiple.php 
                  if($result){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=user.php\">";
                  }
                }
                mysqli_close($conn);
                
                ?>
              </form>
            </div>
            <!-- /.box-body -->
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
<?php include('edit_usermodal.php'); ?>  
<?php include('edit_passwordmodal.php'); ?>  
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
$(document).ready(function() {
$('#example1').on('click','.edituser', function (e) {
  var val = $(this).data('id');
  var userid = $(this).data('userid');
    if($('.edituser').filter(function(){
        return $(this).data('id') === val;       
    }).length) {
        //send ajax request
        $.ajax({
            type: "POST",
            url: 'ShowEditUser.php',
            dataType: 'JSON',
            data: {id: val},
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                $('#modal-edituser').modal('hide');
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("What follows is blank: " + data);
                $('#modal-edituser').modal('hide');
              } else{  
                    $("#userId").val(data.USER_ID);
                    $("#userNameEng").val(data.USER_NAME_EN);
                    $("#userName").val(data.USER_NAME); 
                    $("#edit_password").attr('data-id',data.USER_ID);
                    $('#Authority option[value="'+data.AUTHORITY+'"]').prop('selected', true);
                    $('#reg_id').val(data.REG_ID);
                    $("#reg_ymd").val(data.REG_YMD);
                    $("#reg_time").val(data.REG_TIME);
                    if ($.trim(data.MOD_ID)) {
                      $('#mod_id').val(data.MOD_ID);
                      $("#mod_ymd").val(data.MOD_YMD);
                      $("#mod_time").val(data.MOD_TIME);
                    } else {
                    /*  var now = new Date();
                      var day = ("0" + now.getDate()).slice(-2);
                      var month = ("0" + (now.getMonth() + 1)).slice(-2);
                      var today = now.getFullYear()+"-"+(month)+"-"+(day);
                      var hh = ('0' + now.getHours()).slice(-2);
                      var mm = ('0' + now.getMinutes()).slice(-2);
                      var ss = ('0' + now.getSeconds()).slice(-2);
                      $('#mod_id option[value="'+userid+'"]').prop('selected', true).trigger('change');
                      $("#mod_ymd").val(today);
                      $("#mod_time").val(hh + ':' + mm + ':' + ss); */
                    }

              }  
            }
        });
        
    }
    
});
$('#edit_password').on('click', function (e) {
  var val = $(this).attr("data-id");
  $("#useridpw").val(val);
});

  $('#saveedituser').click(function(e) {
    e.preventDefault();
    if($('#userNameEng').val() == "" )
    {
        alert('Please input User Name English!');
        return;
    } 
    if($('#userName').val() == "")
    {
        alert('Please input User Name!');
        return; 
    }
    var userid = $(this).data('userid');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
    var hh = ('0' + now.getHours()).slice(-2);
    var mm = ('0' + now.getMinutes()).slice(-2);
    var ss = ('0' + now.getSeconds()).slice(-2);
    var time = hh + ':' + mm + ':' + ss;
    $.ajax({
      type:'POST',
      url:'SaveEditUser.php',
      dataType: 'text',
      data: { id:$('#userId').val(),
              name_eng: $('#userNameEng').val(),
              name: $('#userName').val(),
              authority: $('#Authority').val(),
              mod_id: userid,
              mod_ymd: today,
              mod_time: time
            },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success:function(response) {
        if(response == 'success'){
          alert("Update success!");
          $('#modal-edituser').modal('hide');
          window.location.reload();
        } else {
          alert('Failed to Update');
        }
      }
    });//close ajax
  });//close function saveedituser
  $('#saveeditpassword').click(function(e) {
    e.preventDefault();
    if($('#oldPassword').val() == "" || $('#newPassword').val() == "" || $('#confirmPassword').val() == "")
    {
        alert('กรุณาใส่ข้อมูลให้ครบถ้วน');
        return;
    } 
    if($('#newPassword').val() != $('#confirmPassword').val())
    {
        alert('รหัสผ่านไม่เหมือนกัน กรุณากรอกใหม่อีกครั้ง!');
        return; 
    }
    var userid = $(this).data('userid');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
    var hh = ('0' + now.getHours()).slice(-2);
    var mm = ('0' + now.getMinutes()).slice(-2);
    var ss = ('0' + now.getSeconds()).slice(-2);
    var time = hh + ':' + mm + ':' + ss;
    $.ajax({
      type:'POST',
      url:'SaveEditUserPassword.php',
      dataType: 'text',
      data: { id:$('#userId').val(),
              oldPassword: $('#oldPassword').val(),
              newPassword: $('#newPassword').val(),
              confirmPassword: $('#confirmPassword').val(),
              mod_id: userid,
              mod_ymd: today,
              mod_time: time
            },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success:function(response) {
        if(response == 'success'){
          alert("Update Password success!");
          $('#modal-editpassword').modal('hide');
        } else if(response == 'wrong') {
          alert('ใส่รหัสผ่านเก่าผิด กรุณากรอกใหม่อีกครั้ง');
        } else {
          alert(response);
        }
      }
    });//close ajax
  });//close function saveeditpassword
});
$('#modal-edituser').on('shown.bs.modal', function (e) {
document.body.style.overflowY = "hidden";
});
$('#modal-edituser').on('hidden.bs.modal', function (e) {
document.body.style.overflowY = "auto";
});
$('#modal-editpassword').on('hidden.bs.modal', function (e) {
        $(this)
        .find("input,textarea")
            .val('')
        .end()
        $("#useridpw").val('');
    });

</script>
</body>
</html>
