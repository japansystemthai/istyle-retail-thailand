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
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-green" style="min-height: 100%">
<div class="wrapper">
  <?php include('../../header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../../sidebar_customer.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer master maintenance
        <small>การจัดการมาสเตอร์ลูกค้า</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer master</a></li>
        <li class="active">Data customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="newcustomer.php" class="btn btn-block btn-primary">Create new customer<br>เพิ่มลูกค้าใหม่</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Code <br>  รหัสลูกค้า</th>
                  <th>Customer Name <br> ชื่อลูกค้า</th>
                  <th>Customer Name <br> ชื่อลูกค้า</th>
                  <th>Tel <br>  เบอร์โทร</th>
                  <th>Birth date <br>  วันเกิด</th>
                  <th>Gender <br> เพศ</th>
                  <th>Nationality <br>  สัญชาติ</th>
                  <th>Rank <br>  ระดับ</th>
                  <th>Delete <br>  ลบ</th>
                  <th>Edit <br> แก้ไข</th>
                </tr>
                </thead>
                <tbody>
                
                  <?php //connect db
                    include("../../connect.php");
                    $sql = "select C.CST_CODE,  C.TEL_NO, C.CST_NAME_EN, C.CST_NAME, C.DATEOFBIRTH,
                    (SELECT CLASSIFICATION_CODE_EN_NM from M_CLASSIFICATION CL WHERE C.GENDER = CL.CLASSIFICATION_CODE AND CL.CLASSIFICATION_ID = '100') AS GENDER, 
                    (SELECT CLASSIFICATION_CODE_EN_NM from M_CLASSIFICATION CL WHERE C.NATIONALITY = CL.CLASSIFICATION_CODE AND CL.CLASSIFICATION_ID = '300') AS NATIONALITY, 
                    C.EMAIL, C.LINE_ID, C.ADDRESS, M.RANK_NAME,  C.REG_YMD, C.REG_TIME, C.REG_ID, C.MOD_FLG, C.MOD_YMD,  C.MOD_TIME, C.MOD_ID
                      from M_CUSTOMER C, M_RANK M
                      where C.DELETE_FLG = '0'
                      AND C.START_RANK = M.RANK_CODE
                      order by CST_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <tr>
                    <td><?php echo $row['CST_CODE']?></td>
                    <td><?php echo $row['CST_NAME_EN']?></td>
                    <td><?php echo $row['CST_NAME']?></td>
                    <td><?php echo $row['TEL_NO']?></td>
                    <td><?php echo $row['DATEOFBIRTH']?></td>
                    <td><?php echo $row['GENDER']?></td>
                    <td><?php echo $row['NATIONALITY']?></td>
                    <td><?php echo $row['RANK_NAME']?></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['CST_CODE']?>"></td>
                    <td><?php echo "<a class='editcus btn btn-block btn-success btn-sm' data-id='".$row['CST_CODE']."' data-userid='".$objResult["USER_ID"]."' role='button' data-toggle='modal' data-target='#modal-editcus' id='editcus' name='editcus'>Edit</a>"; ?></td>
                  </tr>
                  <?php
                    }
                    ?>
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Customer Code <br>  รหัสลูกค้า</th>
                  <th>Customer Name <br> ชื่อลูกค้า</th>
                  <th>Customer Name <br> ชื่อลูกค้า</th>
                  <th>Tel <br>  เบอร์โทร</th>
                  <th>Birth date <br>  วันเกิด</th>
                  <th>Gender <br> เพศ</th>
                  <th>Nationality <br>  สัญชาติ</th>
                  <th>Rank <br>  ระดับ</th>
                  <th>Delete <br>  ลบ</th>
                  <th>Edit <br> แก้ไข</th>
                </tr>
                </tfoot>
              </table>
              <input class="btn btn-block btn-danger btn-flat" name="delete" type="submit" id="delete" value="Delete" style="width: 30%;display: block;margin-right: auto;margin-left: auto;" onclick="return confirm('Are you sure you want to delete that?');">
              <?php
                // Check if delete button active, start this 
                if(isset($_POST['delete']))
                {
                    $checkbox = $_POST['checkbox'];
                    date_default_timezone_set("Asia/Bangkok");
                  for($i=0;$i<count($checkbox);$i++){

                    $del_id = $checkbox[$i];
                    $sql = "UPDATE M_CUSTOMER SET MOD_YMD = '".date("Y-m-d")."', MOD_TIME = '".date("H:i:s")."',MOD_ID = '".$objResult["USER_ID"]."',DELETE_FLG = '1' WHERE CST_CODE = '$del_id'";
                    $result = mysqli_query($conn,$sql);
                  }
                  // if successful redirect to delete_multiple.php 
                  if($result){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=customer.php\">";
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

<?php include('edit_customer.php'); ?>  
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
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
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

  })
</script>
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
<script >
$(document).ready(function() {
$('#example1').on('click','.editcus', function (e) {
  e.preventDefault();
  var val = $(this).data('id');
  var userid = $(this).data('userid');
    if($('.editcus').filter(function(){
        return $(this).data('id') === val;       
    }).length) {
        //send ajax request
        $.ajax({
            type: "POST",
            url: 'ShowEditCust.php',
            dataType: 'JSON',
            data: {id: val},
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                $('#modal-editcus').modal('hide');
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("What follows is blank: " + data);
                $('#modal-editcus').modal('hide');
              } else{  
            
                    $("#cusCode").val(data.CST_CODE);
                    $("#tel").val(data.TEL_NO);
                    $("#cusNameEng").val(data.CST_NAME_EN); 
                    $("#cusName").val(data.CST_NAME);
                    $("#birth").val(data.DATEOFBIRTH);
                    $('#gender option[value="'+data.GENDER+'"]').prop('selected', true);
                    $('#race option[value="'+data.NATIONALITY+'"]').prop('selected', true).trigger('change');
                    $("#email").val(data.EMAIL);
                    $("#address").val(data.ADDRESS);
                    $("#lineId").val(data.LINE_ID);
                    $('#rank option[value="'+data.START_RANK+'"]').prop('selected', true);
                    $("#reg_id").val(data.REG_ID);
                    $("#reg_ymd").val(data.REG_YMD);
                    $("#reg_time").val(data.REG_TIME);
                    if ($.trim(data.MOD_ID)) {
                      $("#mod_id").val(data.MOD_ID);
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
  $('#saveeditcust').click(function(e) {
    e.preventDefault();
    var regexp = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,9}$/im
    if($('#tel').val() == "" || !regexp.test($('#tel').val()))
    {
        alert('Please input Telephone Number!');
        return;
    } 
    if($('#cusNameEng').val() == "")
    {
        alert('Please input Customer Name English!');
        return; 
    }
    if($('#cusName').val() == "")
    {
        alert('Please input Customer Name!');
        return; 
    }
    
    if($('#birth').val() == "" || $("#birth").val().replace(/[^0-9]/g,"").length != 8)
    {
        alert('Please input Birthdate!');
        return; 
    }
    if($('#reg_id').val() == "")
    {
        alert('Please input Register ID!');
        return;
    }
    if($('#reg_ymd').val() == "")
    {
        alert('Please input Register ID!');
        return; 
    }
    if($('#reg_time').val() == "")
    {
        alert('Please input Register ID!');
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
      url:'SaveEditCust.php',
      dataType: 'text',
      data: { id:$('#cusCode').val(),
              tel: $('#tel').val(),
              name_eng: $('#cusNameEng').val(),
              name: $('#cusName').val(),
              birth: $('#birth').val(),
              gender: $('#gender').val(),
              race: $('#race').val(),
              address: $('#address').val(),
              email: $('#email').val(),
              lineId: $('#lineId').val(),
              rank: $('#rank').val(),
            /*  reg_id: $('#reg_id').val(),
              reg_ymd: $('#reg_ymd').val(),
              reg_time: $('#reg_time').val(),*/
              mod_id: userid,
              mod_ymd: today,
              mod_time: time  
            },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success:function(data) {
        if(data == 'success'){
          alert("Update success!");
          $('#modal-editcus').modal('hide');
          window.location.reload();
        } else if(data == 'Phone Number already exists!') {
          alert("Phone Number already exists!"); 
        } else {
          alert('Failed to Update');
        }
      }
    });//close ajax
  });
});

</script>
</body>
</html>
